@extends('user.master')

@section('css')
    <style>
        .product-image {
            max-width: 100%;
            /* Prevent image overflow */
            max-height: 100%;
            /* Maintain height limits */
            width: auto;
            height: auto;
            aspect-ratio: 1 / 1;
            /* Maintain a square aspect ratio */
            object-fit: contain;
            /* Show the entire image without distortion */
            border-radius: 8px;
            /* Optional: rounded corners */
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
            /* Optional: subtle shadow */
        }

        .product-image-container {
            width: 70px;
            height: 70px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f8f8;
        }

        .error {
            color: red;
            font-size: 0.875rem;
            margin-top: 5px;
        }

        /* Common Button Styling for Razorpay and COD */
        .payment-button {
            display: inline-block;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        /* COD Button */
        .payment-button--cod {
            background-color: #28a745;
        }

        .payment-button--cod:hover {
            background-color: #218838;
        }

        /* Razorpay Payment Button */
        .razorpay-payment-button {
            background-color: #f37254;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .razorpay-payment-button:hover {
            background-color: #d35440;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .razorpay-payment-button:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(243, 114, 84, 0.4);
        }
    </style>
@endsection

@section('content')
    <!--====== Section 1 ======-->
    <div class="u-s-p-y-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="breadcrumb">
                    <div class="breadcrumb__wrap">
                        <ul class="breadcrumb__list">
                            <li class="has-separator">

                                <a href="index.html">Home</a>
                            </li>
                            <li class="is-marked">

                                <a href="checkout.html">Checkout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->





    <!--====== Section 3 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="checkout-f">
                    <div class="row">
                        <div class="col-lg-6">
                            <h1 class="checkout-f__h1">DELIVERY INFORMATION</h1>
                            <form class="checkout-f__delivery" id="checkout-form">
                                <div class="u-s-m-b-30">

                                    <!--====== First Name, Last Name ======-->
                                    <div class="gl-inline">
                                        <div class="u-s-m-b-15">
                                            <label class="gl-label" for="billing-fname">FIRST NAME *</label>
                                            <input class="input-text input-text--primary-style" type="text"
                                                id="billing-fname" data-bill="" required>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <label class="gl-label" for="billing-lname">LAST NAME *</label>
                                            <input class="input-text input-text--primary-style" type="text"
                                                id="billing-lname" data-bill="" required>
                                        </div>
                                    </div>

                                    <!--====== E-MAIL ======-->
                                    <div class="u-s-m-b-15">
                                        <label class="gl-label" for="billing-email">E-MAIL *</label>
                                        <input class="input-text input-text--primary-style" type="email"
                                            id="billing-email" data-bill="" required>
                                    </div>

                                    <!--====== PHONE ======-->
                                    <div class="u-s-m-b-15">
                                        <label class="gl-label" for="billing-phone">PHONE *</label>
                                        <input class="input-text input-text--primary-style" type="text"
                                            id="billing-phone" data-bill="" required minlength="10" maxlength="10">
                                    </div>


                                    <!--====== STATE/PROVINCE ======-->
                                    <div class="u-s-m-b-15">
                                        <label class="gl-label" for="billing-state">STATE *</label>
                                        <select class="select-box select-box--primary-style" id="billing-state"
                                            data-bill="" required>

                                        </select>
                                    </div>
                                    <!--====== Town / City ======-->
                                    <div class="u-s-m-b-15">
                                        <label class="gl-label" for="billing-town-city">CITY *</label>
                                        <select class="select-box select-box--primary-style" id="billing-town-city"
                                            data-bill="" required>
                                            <option selected value="">Choose Town/City</option>
                                        </select>
                                    </div>

                                    <!--====== Village (Optional) ======-->
                                    <div class="u-s-m-b-15">
                                        <label class="gl-label" for="billing-village">VILLAGE (Optional)</label>
                                        <input class="input-text input-text--primary-style" type="text"
                                            id="billing-village" placeholder="Enter village name (if applicable)">
                                    </div>

                                    <!--====== Street Address ======-->
                                    <div class="u-s-m-b-15">
                                        <label class="gl-label" for="billing-street">STREET ADDRESS *</label>
                                        <input class="input-text input-text--primary-style" type="text"
                                            id="billing-street" placeholder="House name and street name" data-bill=""
                                            required>
                                    </div>
                                    <div class="u-s-m-b-15">
                                        <label for="billing-street-optional"></label>
                                        <input class="input-text input-text--primary-style" type="text"
                                            id="billing-street-optional" placeholder="Apartment, suite unit etc. (optional)"
                                            data-bill="">
                                    </div>


                                    <!--====== ZIP/POSTAL ======-->
                                    <div class="u-s-m-b-15">
                                        <label class="gl-label" for="billing-zip">ZIP/POSTAL CODE *</label>
                                        <input class="input-text input-text--primary-style" type="text" id="billing-zip"
                                            placeholder="Zip/Postal Code" data-bill="" required>
                                    </div>

                                    <!-- Submit Button -->
                                    <div>
                                        <button class="btn btn--e-transparent-brand-b-2" type="submit">SAVE</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <h1 class="checkout-f__h1">ORDER SUMMARY</h1>

                            <!--====== Order Summary ======-->
                            <div class="o-summary">
                                <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__section u-s-m-b-30">
                                        @foreach ($cartItems as $cartItem)
                                            <div class="o-summary__item-wrap gl-scroll">
                                                <div class="o-card__flex">
                                                    <div class="o-card__img-wrap">
                                                        <div class="product-image-container">
                                                            @if ($cartItem->product->images->isNotEmpty())
                                                                <img class="product-image"
                                                                    src="{{ asset($cartItem->product->images->first()->image) }}"
                                                                    alt="Product Image">
                                                            @else
                                                                <img class="product-image"
                                                                    src="{{ asset('default-image.jpg') }}"
                                                                    alt="Default Image">
                                                            @endif
                                                        </div>

                                                    </div>
                                                    <div class="o-card__info-wrap">
                                                        <span class="o-card__name">
                                                            <a href="#">{{ $cartItem->product->productName }}</a>
                                                        </span>
                                                        <span class="o-card__quantity">Quantity x
                                                            {{ $cartItem->quantity }}</span>
                                                        <span class="o-card__price">${{ $cartItem->price }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>

                                <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__box">
                                        <table class="o-summary__table">
                                            <tbody>
                                                <tr>
                                                    <td>SHIPPING</td>
                                                    <td>₹{{ number_format($shipping, 2) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>TAX (18%)</td>
                                                    <td>₹{{ number_format($tax, 2) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>SUBTOTAL</td>
                                                    <td>₹{{ number_format($subtotal, 2) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>GRAND TOTAL</td>
                                                    <td>₹{{ number_format($grandTotal, 2) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="o-summary__section u-s-m-b-30 payment-section" style="display: none;">
                                    <div class="o-summary__box">
                                        <h1 class="checkout-f__h1">PAYMENT INFORMATION</h1>
                                        <div class="u-s-m-b-10">
                                            <!-- COD Button -->
                                            <div class="button-container">
                                               <a href="{{ route('payOffline') }}"> <button type="button" id="cash-on-delivery-btn"
                                                    class="payment-button payment-button--cod">
                                                    Cash on Delivery
                                                </button></a>
                                            </div>
                                        </div>

                                        <div class="u-s-m-b-10">
                                            <!-- Online Payment Button -->
                                            <form id="paymentForm"
                                                action="
                                            {{ route('payOnline') }}"
                                                method="POST">
                                                <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="rzp_test_aRaPVVcfmtYbxs"
                                                    data-amount="{{ Session('orderTotal') }}" data-currency="INR" data-order_id="{{ Session('orderId') }}"
                                                    data-buttontext="Online payment" data-name="{{ Session('product_name') }}"
                                                    data-description="{{ Session('product_desc') }}" data-theme.color="#F37254"></script>
                                                <input type="hidden" custom="Hidden Element" name="hidden">
                                            </form>
                                        </div>

                                    </div>
                                </div>


                            </div>
                            <!--====== End - Order Summary ======-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
@endsection


@section('script')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#checkout-form").validate({
                rules: {
                    'billing-fname': {
                        required: true,
                        minlength: 2
                    },
                    'billing-lname': {
                        required: true,
                        minlength: 2
                    },
                    'billing-email': {
                        required: true,
                        email: true
                    },
                    'billing-phone': {
                        required: true,
                        minlength: 10,
                        digits: true
                    },
                    'billing-street': {
                        required: true
                    },
                    'billing-town-city': {
                        required: true
                    },
                    'billing-state': {
                        required: true
                    },
                    'billing-zip': {
                        required: true,
                        minlength: 5,
                        digits: true
                    }
                },
                messages: {
                    'billing-fname': {
                        required: "Please enter your first name",
                        minlength: "Your first name must be at least 2 characters long"
                    },
                    'billing-lname': {
                        required: "Please enter your last name",
                        minlength: "Your last name must be at least 2 characters long"
                    },
                    'billing-email': {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address"
                    },
                    'billing-phone': {
                        required: "Please enter your phone number",
                        minlength: "Your phone number must be at least 10 digits",
                        digits: "Please enter a valid phone number"
                    },
                    'billing-street': {
                        required: "Please enter your street address"
                    },
                    'billing-town-city': {
                        required: "Please choose a town/city"
                    },
                    'billing-state': {
                        required: "Please choose a state/province"
                    },
                    'billing-zip': {
                        required: "Please enter your ZIP code",
                        minlength: "Your ZIP code must be at least 5 digits",
                        digits: "Please enter a valid ZIP code"
                    }
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                submitHandler: function(form) {
                    // Show payment section on successful validation
                    $('.payment-section').slideDown();
                }
            });

            $('#checkout-form').on('submit', function(e) {
                e.preventDefault();

                let isValid = true;

                // Reset previous error highlights
                $('#checkout-form input, #checkout-form select').removeClass('input-error');

                // Validate required fields
                $('#checkout-form input:required, #checkout-form select:required').each(function() {
                    if ($(this).val().trim() === '') {
                        isValid = false;
                        $(this).addClass('input-error'); // Highlight error
                    }
                });

                if (isValid) {
                    // Show the payment section
                    $('.payment-section').slideDown();
                } else {
                    alert('Please fill all required fields correctly.');
                }
            });

            // Load states on page load
            $.ajax({
                url: '/get/states', // Endpoint to fetch states
                type: 'GET',
                success: function(response) {

                    $('#billing-state').append('<option value="">Choose State/Province</option>');
                    $.each(response, function(index, state) {
                        $('#billing-state').append(
                            `<option value="${state.id}">${state.state}</option>`
                        );
                    });
                },
                error: function(xhr) {
                    alert(xhr.responseText);
                }
            });

            // Load cities based on selected state
            $('#billing-state').on('change', function() {
                var stateId = $(this).val();
                $('#billing-town-city').html(
                    '<option value="">Choose Town/City</option>'); // Reset city dropdown

                if (stateId) {
                    $.ajax({
                        url: `/get/cities/${stateId}`, // Correctly pass the stateId as part of the URL
                        type: 'GET',
                        success: function(data) {
                            $('#billing-town-city').empty().append(
                                '<option selected disabled>Choose Town/City</option>');
                            $.each(data, function(index, city) {
                                $('#billing-town-city').append(
                                    `<option value="${city.id}">${city.city}</option>`
                                );
                            });
                        },
                    });

                }
            });


        });
    </script>
@endsection
