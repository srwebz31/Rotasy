{{-- 
    This Portion is to be updated.
    If The Telephone component is loaded twice then it is also required that we change the script below because two elements cannot have same id's.
--}}
@once
    @push('endScripts')
        <style>
            .iti__selected-flag:focus {
                outline: 0px;
            }
            .iti {
                width: 100%;
            }
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js" integrity="sha512-DNeDhsl+FWnx5B1EQzsayHMyP6Xl/Mg+vcnFPXGNjUZrW28hQaa1+A4qL9M+AiOMmkAhKAWYHh1a+t6qxthzUw==" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css" integrity="sha512-yye/u0ehQsrVrfSd6biT17t39Rg9kNc+vENcCXZuMz2a+LWFGvXUnYuWUW6pbfYj1jcBb/C39UZw2ciQvwDDvg==" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" integrity="sha512-BNZ1x39RMH+UYylOW419beaGO0wqdSkO7pi1rYDYco9OL3uvXaC/GTqA5O4CVK2j4K9ZkoDNSSHVkEQKkgwdiw==" crossorigin="anonymous"></script>
        <!-- JAVASCRIPT CODE REQUIRED -->
        <script>
            let input = document.querySelector("#phone");
            
            let iti = window.intlTelInput(input, {
                separateDialCode: true,
                initialCountry: "in",
                hiddenInput: "mobile",
            });

            input.addEventListener('countrychange', function(e) {
                console.log(iti.getSelectedCountryData().dialCode);
            });
        </script>
    @endpush
@endonce