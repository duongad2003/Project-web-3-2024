function convertToVNDFormat(number) {
    const formatter = new Intl.NumberFormat('vi-VN', {
        style: 'currency',
        currency: 'VND',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0,
    });
    const formattedNumber = formatter.format(number).replace(' ', '').replace('₫', 'VNĐ').replace('.', ',');
    return formattedNumber;
}




(function($) {
    "use strict";

    // Spinner
    var spinner = function() {
        setTimeout(function() {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner(0);


    // Fixed Navbar
    $(window).scroll(function() {
        if ($(window).width() < 992) {
            if ($(this).scrollTop() > 55) {
                $('.fixed-top').addClass('shadow');
            } else {
                $('.fixed-top').removeClass('shadow');
            }
        } else {
            if ($(this).scrollTop() > 55) {
                $('.fixed-top').addClass('shadow').css('top', -55);
            } else {
                $('.fixed-top').removeClass('shadow').css('top', 0);
            }
        }
    });


    // Back to top button
    $(window).scroll(function() {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function() {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });


    // Testimonial carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 2000,
        center: false,
        dots: true,
        loop: true,
        margin: 25,
        nav: true,
        navText: [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 1
            },
            768: {
                items: 1
            },
            992: {
                items: 2
            },
            1200: {
                items: 2
            }
        }
    });




    // Product Quantity
    $('.quantity button').on('click', function() {
        var button = $(this);
        var oldValue = button.parent().parent().find('input').val();
        if (button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 0;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 0;
            } else {
                newVal = 0;
            }
        }
        button.parent().parent().find('input').val(newVal);
    });

})(jQuery);

document.addEventListener("DOMContentLoaded", function() {
    const plusButtons = document.querySelectorAll('.btn-plus');
    const minusButtons = document.querySelectorAll('.btn-minus');
    const updateButton = document.querySelector('.cart-summary button[name="update"]');
    const quantityInputs = document.querySelectorAll('.quantity input[type="number"]');
    const update = document.getElementById('update');

    plusButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const input = this.closest('.quantity').querySelector('input[type="number"]');
            const currentValue = parseInt(input.value);
            input.value = currentValue + 1;
            updateCart();
        });
    });

    minusButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const input = this.closest('.quantity').querySelector('input[type="number"]');
            const currentValue = parseInt(input.value);
            if (currentValue > 1) {
                input.value = currentValue - 1;
                updateCart();
            }
        });
    });

    updateButton.addEventListener('click', function(event) {
        event.preventDefault();
        updateCart();
        updateCarttb();
    });

    window.onload = function() {
        updateCart();
        updateCarttb();
    }

    function updateCartQuantity() {
        var cart = JSON.parse(localStorage.getItem("cart")) || [];
        var totalQuantity = 0;
        for (var i = 0; i < cart.length; i++) {
            totalQuantity += cart[i].quantity;
        }
        var cartQuantityElement = document.getElementById("cart-quantity");
        cartQuantityElement.textContent = totalQuantity;
    }

    function updateCart() {
        let totalPrice = 0;
        quantityInputs.forEach(input => {
            const price = parseInt(input.closest('tr').querySelector('td:nth-child(2)').textContent.replace(/,/g, ''));
            const quantity = parseInt(input.value);
            const total = price * quantity;
            const totalVND = convertToVNDFormat(total);
            input.closest('tr').querySelector('td:nth-child(4)').textContent = totalVND;
            totalPrice += total;
        });
        // let shippingCost = 15000; // Giá ship mặc định
        // let grandTotal = totalPrice + shippingCost;
        // if (couponInput.value === "123456") { // Kiểm tra xem đã áp dụng mã coupon chưa
        //     shippingCost = 0;
        //     grandTotal = totalPrice + shippingCost;
        //     // Nếu đã áp dụng mã coupon, tiền ship sẽ là 0
        // } else {
        //     shippingCost = 15000;
        //     grandTotal = totalPrice + shippingCost;
        // }
        const shippingCost = 15000; // Assume shipping cost is $1
        const grandTotal = totalPrice + shippingCost;

        const totalpriceVND = convertToVNDFormat(totalPrice);
        const shippingCostVND = convertToVNDFormat(shippingCost);
        const grandtotalVND = convertToVNDFormat(grandTotal);
        document.querySelector('.cart-summary p:nth-child(2) span').textContent = totalpriceVND.replace(' ₫', ' VNĐ');
        // updateCartQuantity();
    }



    function updateCarttb() {
        let totalPrice = 0;
        quantityInputs.forEach(input => {
            const price = parseInt(input.closest('tr').querySelector('td:nth-child(2)').textContent.replace(/,/g, ''));
            const quantity = parseInt(input.value);
            const total = price * quantity;
            const totalVND = convertToVNDFormat(total);
            input.closest('tr').querySelector('td:nth-child(4)').textContent = totalVND;
            totalPrice += total;
        });
        // let shippingCost = 15000; // Giá ship mặc định
        // let grandTotal = totalPrice + shippingCost;
        // if (couponInput.value === "123456") { // Kiểm tra xem đã áp dụng mã coupon chưa
        //     shippingCost = 0;
        //     grandTotal = totalPrice + shippingCost;
        //     // Nếu đã áp dụng mã coupon, tiền ship sẽ là 0
        // } else {
        //     shippingCost = 15000;
        //     grandTotal = totalPrice + shippingCost;
        // }
        const shippingCost = 15000; // Assume shipping cost is $1
        const grandTotal = totalPrice + shippingCost;

        const totalpriceVND = convertToVNDFormat(totalPrice);
        const shippingCostVND = convertToVNDFormat(shippingCost);
        const grandtotalVND = convertToVNDFormat(grandTotal);
        document.querySelector('.cart-summary p:nth-child(2) span').textContent = totalpriceVND.replace(' ₫', ' VNĐ');
        document.querySelector('.cart-summary p:nth-child(3) span').textContent = shippingCostVND;
        document.querySelector('.cart-summary h2 span').textContent = grandtotalVND;
        updateCartQuantity();
    }
    updateCartQuantity();
});

document.addEventListener("DOMContentLoaded", function() {
    var homeRadio = document.getElementById("home");
    var addressSection = document.querySelector(".address");
    var storeRadio = document.getElementById("store");

    homeRadio.addEventListener("click", function() {
        if (homeRadio.checked) {
            addressSection.style.visibility = "visible";
        }
    });

    storeRadio.addEventListener("click", function() {
        addressSection.style.visibility = "hidden";
    });
});
document.addEventListener('DOMContentLoaded', function() {
    var directCheckRadio = document.getElementById('directcheck');
    var qrCodeContainer = document.getElementById('qrCodeContainer');
    var cashPaymentRadio = document.getElementById('cashpayment');
    var placeOrderBtn = document.getElementById('placeOrderBtn');

    directCheckRadio.addEventListener('change', function() {
        if (directCheckRadio.checked) {
            qrCodeContainer.style.display = 'block';
        }
    });

    cashPaymentRadio.addEventListener('change', function() {
        if (cashPaymentRadio.checked) {
            qrCodeContainer.style.display = 'none';
        }
    });
    placeOrderBtn.addEventListener('click', function() {
        // Check if any payment method is selected
        var paymentSelected = directCheckRadio.checked || Array.from(otherPaymentRadios).some(radio => radio.checked);
        if (!paymentSelected) {
            alert('Làm ơn chọn phương thức tahnh toán.');
            return; // Don't proceed further if payment method is not selected
        }

        alert('Thanh toán đang được kiểm tra chúng tôi sẽ liên hệ với bạn sớm nhất.');
        window.location.href = "index.php";
    });
});
document.getElementById('image-input').addEventListener('change', function() {
    var file = this.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(event) {
            document.getElementById('preview-image').setAttribute('src', event.target.result);
        };
        reader.readAsDataURL(file);
    }
});
document.addEventListener("DOMContentLoaded", function() {
    var checkboxes = document.querySelectorAll('#filter input[type="checkbox"]');
    var products = document.querySelectorAll('.product');

    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            filterProductsByPrice();
        });
    });

    function filterProductsByPrice() {
        var selectedPrices = [];
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                selectedPrices.push(checkbox.value);
            }
        });

        products.forEach(function(product) {
            var price = parseFloat(product.getAttribute('data-price'));
            var showProduct = false;

            if (selectedPrices.length === 0) {
                showProduct = true;
            } else {
                selectedPrices.forEach(function(range) {
                    var [min, max] = range.split('-').map(Number);
                    if (max) {
                        if (price >= min && price <= max) {
                            showProduct = true;
                        }
                    } else {
                        if (price >= min) {
                            showProduct = true;
                        }
                    }
                });
            }

            product.style.display = showProduct ? 'block' : 'none';
        });
    }
});

function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('preview');
        output.src = reader.result;
        output.style.display = 'block';
    }
    reader.readAsDataURL(event.target.files[0]);
}