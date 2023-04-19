<div class="container-xxl">

    <div class="row">

        <div class="col-lg-6">

            <div class="card">

                <div class="card-header">
                    <h4>Cart Items</h4>
                </div>

                <div class="card-body">






                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Camp</th>
                                <th>Price</th>
                                <th>Session</th>
                                <th>Time Slot</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($camps as $camp)
                                @foreach ($camp['sessions'] as $session)
                                    <tr>
                                        @if ($loop->first)
                                            <td rowspan="{{ count($camp['sessions']) }}">{{ $camp['name'] }}</td>
                                            <td rowspan="{{ count($camp['sessions']) }}">{{ $camp['price'] }}
                                                {{ config('app.currency') }}</td>
                                        @endif
                                        <td>{{ $session['start_date'] }} - {{ $session['end_date'] }}</td>
                                        <td>
                                            @foreach ($session['slots'] as $slot)
                                                <span wire:click="removeFromCart({{ $slot['id'] }})">
                                                    {{ $slot['start_time'] . '-' . $slot['end_time'] }}
                                                    <button class="btn btn-sm btn-danger" type="button"
                                                        onclick="removeFromCart({{ $slot['id'] }},this)">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </span>
                                                <hr>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>




                </div>

            </div>


            <div class="col-lg-6">

            </div>

        </div>

        <div class="col-lg-6">

            <div class="card">

                <div class="card-header">
                    <h4>Checkout</h4>
                </div>

                <div class="card-body">

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Total Camps</th>
                                <th>Total Sessions</th>
                                <th>Total Slots</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $checkoutCalculations['total_camps'] }}</td>
                                <td>{{ $checkoutCalculations['total_sessions'] }}</td>
                                <td>{{ $checkoutCalculations['total_slots'] }}</td>
                                <td>{{ $checkoutCalculations['total_price'] }} {{ config('app.currency') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <br><br>

                    <div class="row text-center" wire:ignore>

                        <form id="payment-form ">
                            <div id="card-container"></div>
                            <button id="card-button" class="btn btn-primary" type="button">Pay</button>
                        </form>
                        <div id="payment-status-container"></div>


                    </div>
                </div>

            </div>

        </div>



    </div>

</div>

@push('scripts')
    <script type="text/javascript" src="https://sandbox.web.squarecdn.com/v1/square.js"></script>
    <script>
        const appId = '{{ config('services.square.application_id') }}';
        const locationId = '{{ config('services.square.location_id') }}';

        async function initializeCard(payments) {
            const card = await payments.card();
            await card.attach('#card-container');
            return card;
        }

        document.addEventListener('DOMContentLoaded', async function() {
            if (!window.Square) {
                throw new Error('Square.js failed to load properly');
            }
            const payments = window.Square.payments(appId, locationId);
            let card;
            try {
                card = await initializeCard(payments);
            } catch (e) {
                console.error('Initializing Card failed', e);
                return;
            }

            async function handlePaymentMethodSubmission(event, paymentMethod) {
                event.preventDefault();

                document.getElementById('card-button').disabled = true;
                document.getElementById('card-button').innerText = 'Processing...';


                try {
                    // disable the submit button as we await tokenization and make a
                    // payment request.
                    cardButton.disabled = true;
                    const token = await tokenize(paymentMethod);
                    const paymentResults = await createPayment(token);

                    console.log('handle', paymentResults);
                    displayPaymentResults('SUCCESS');
                    showStatus('Payment made successfully', 'success');

                    window.location.href = '{{ route("profile.index") }}';

                    console.debug('Payment Success', paymentResults);
                } catch (e) {
                    cardButton.disabled = false;
                    displayPaymentResults('FAILURE');

                    showStatus('Some issue occured, please try again', 'error');

                    document.getElementById('card-button').disabled = false;
                    document.getElementById('card-button').innerText = 'Pay';

                    console.error(e.message);
                }
            }

            const cardButton = document.getElementById(
                'card-button'
            );
            cardButton.addEventListener('click', async function(event) {
                await handlePaymentMethodSubmission(event, card);
            });


        });


        // Call this function to send a payment token, buyer name, and other details
        // to the project server code so that a payment can be created with
        // Payments API
        async function createPayment(token) {
            const body = JSON.stringify({
                locationId,
                sourceId: token,
                totalPrice: {{ $checkoutCalculations['total_price'] }}

            });
            const paymentResponse = await fetch('/payments/store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body,
            });

            console.log(paymentResponse);
            if (paymentResponse.ok) {

                return paymentResponse.json();
            }
            const errorBody = await paymentResponse.text();
            throw new Error(errorBody);
        }

        // This function tokenizes a payment method.
        // The ‘error’ thrown from this async function denotes a failed tokenization,
        // which is due to buyer error (such as an expired card). It is up to the
        // developer to handle the error and provide the buyer the chance to fix
        // their mistakes.
        async function tokenize(paymentMethod) {
            const tokenResult = await paymentMethod.tokenize();
            if (tokenResult.status === 'OK') {
                return tokenResult.token;
            } else {
                let errorMessage = `Tokenization failed-status: ${tokenResult.status}`;
                if (tokenResult.errors) {
                    errorMessage += ` and errors: ${JSON.stringify(
         tokenResult.errors
       )}`;
                }
                throw new Error(errorMessage);
            }
        }

        // Helper method for displaying the Payment Status on the screen.
        // status is either SUCCESS or FAILURE;
        function displayPaymentResults(status) {
            const statusContainer = document.getElementById(
                'payment-status-container'
            );
            if (status === 'SUCCESS') {
                statusContainer.classList.remove('is-failure');
                statusContainer.classList.add('is-success');
            } else {
                statusContainer.classList.remove('is-success');
                statusContainer.classList.add('is-failure');
            }

            statusContainer.style.visibility = 'visible';
        }
    </script>
@endpush
