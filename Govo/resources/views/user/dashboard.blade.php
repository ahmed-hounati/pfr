<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <nav class="bg-white border-gray-200">
        <div class="bg-gray-900">
            <div class="px-4 py-5 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
                <div class="relative flex items-center justify-between">
                    <div class="flex items-center">
                        <a href="/" aria-label="Company" title="Company" class="inline-flex items-center mr-8">
                            <img src="{{ asset('images/govo-logo.png') }}" class="w-32" alt="logo">
                        </a>
                        <ul class="flex items-center hidden space-x-8 lg:flex">
                            <li><a href="/categories" aria-label="Our product" title="Our product"
                                    class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400">Categories</a>
                            </li>
                            <li><a href="/Opportunities" aria-label="Product pricing" title="Product pricing"
                                    class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400">Opportunities</a>
                            </li>
                            <li><a href="/about" aria-label="About us" title="About us"
                                    class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400">About
                                    us</a></li>
                        </ul>
                    </div>
                    <ul class="flex items-center hidden space-x-8 lg:flex">
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="inline-flex items-center justify-center h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-deep-purple-accent-400 hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
                                    aria-label="Logout" title="Logout">Logout</button>
                            </form>
                        </li>
                        <li id="cartIcon">
                            <i class="fa-solid fa-cart-shopping fa-lg text-white"></i>
                            <span id="orderCount"
                                class="inline-block px-2 py-1 text-sm font-semibold leading-tight text-white bg-blue-500 rounded-full">
                            </span>
                        </li>
                    </ul>
                    <div id="cartModal"
                        class="fixed inset-0 z-50 bg-gray-900 h-4/5 bg-opacity-0 py-24 px-12 flex justify-end hidden">
                        <div
                            class="bg-gradient-to-r from-green-400 via-green-500 to-green-600 p-6 rounded-lg max-h-full overflow-y-auto">
                            <div class="flex flex-row justify-between">
                                <h2 class="text-xl font-semibold mb-4">Your Cart</h2>
                                <button id="closeModal" class="bg-red-500 text-white px-4 py-2 rounded-lg"><i
                                        class="fa-solid fa-xmark"></i></button>
                            </div>

                            <div id="confirmContainer" class="flex flex-row mt-4">
                                <button id="confirmButton"
                                    class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Commande</button>
                            </div>
                            <ul id="cartItems" class="py-6"></ul>
                        </div>
                    </div>

                    <!-- Mobile menu -->
                    <div class="lg:hidden">
                        <button aria-label="Open Menu" title="Open Menu"
                            class="p-2 -mr-1 transition duration-200 rounded focus:outline-none focus:shadow-outline">
                            <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M23,13H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,13,23,13z"></path>
                                <path fill="currentColor"
                                    d="M23,6H1C0.4,6,0,5.6,0,5s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,6,23,6z"></path>
                                <path fill="currentColor"
                                    d="M23,20H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,20,23,20z"></path>
                            </svg>
                        </button>
                        <!-- Mobile menu dropdown
                            <div class="absolute top-0 left-0 w-full">
                              <div class="p-5 bg-white border rounded shadow-sm">
                                <div class="flex items-center justify-between mb-4">
                                  <div>
                                    <a href="/" aria-label="Company" title="Company" class="inline-flex items-center">
                                      <svg class="w-8 text-deep-purple-accent-400" viewBox="0 0 24 24" stroke-linejoin="round" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" stroke="currentColor" fill="none">
                                        <rect x="3" y="1" width="7" height="12"></rect>
                                        <rect x="3" y="17" width="7" height="6"></rect>
                                        <rect x="14" y="1" width="7" height="6"></rect>
                                        <rect x="14" y="11" width="7" height="12"></rect>
                                      </svg>
                                      <span class="ml-2 text-xl font-bold tracking-wide text-gray-800 uppercase">Company</span>
                                    </a>
                                  </div>
                                  <div>
                                    <button aria-label="Close Menu" title="Close Menu" class="p-2 -mt-2 -mr-2 transition duration-200 rounded hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                      <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
                                        <path
                                          fill="currentColor"
                                          d="M19.7,4.3c-0.4-0.4-1-0.4-1.4,0L12,10.6L5.7,4.3c-0.4-0.4-1-0.4-1.4,0s-0.4,1,0,1.4l6.3,6.3l-6.3,6.3 c-0.4,0.4-0.4,1,0,1.4C4.5,19.9,4.7,20,5,20s0.5-0.1,0.7-0.3l6.3-6.3l6.3,6.3c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3 c0.4-0.4,0.4-1,0-1.4L13.4,12l6.3-6.3C20.1,5.3,20.1,4.7,19.7,4.3z"
                                        ></path>
                                      </svg>
                                    </button>
                                  </div>
                                </div>
                                <nav>
                                  <ul class="space-y-4">
                                    <li><a href="/" aria-label="Our product" title="Our product" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Product</a></li>
                                    <li><a href="/" aria-label="Our product" title="Our product" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Features</a></li>
                                    <li><a href="/" aria-label="Product pricing" title="Product pricing" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Pricing</a></li>
                                    <li><a href="/" aria-label="About us" title="About us" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">About us</a></li>
                                    <li><a href="/" aria-label="Sign in" title="Sign in" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Sign in</a></li>
                                    <li>
                                      <a
                                        href="/"
                                        class="inline-flex items-center justify-center w-full h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-deep-purple-accent-400 hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
                                        aria-label="Sign up"
                                        title="Sign up"
                                      >
                                        Sign up
                                      </a>
                                    </li>
                                  </ul>
                                </nav>
                              </div>
                            </div>
                            -->
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <section class="px-12 py-12">
        <h1 class="text-3xl font-bold">ALL PLATS :</h1>
        @if (session('success'))
            <div class="bg-green-100 border mt-8 border-green-400 text-green-700 px-4 py-3 rounded relative"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                </span>
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border mt-8 border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                </span>
            </div>
        @endif
        <div class="p-24 flex flex-wrap items-center justify-center">
            @foreach ($plats as $plat)
                <div class="flex-shrink-0 m-6 relative overflow-hidden bg-orange-500 rounded-lg max-w-xs shadow-lg">
                    <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none"
                        style="transform: scale(1.5); opacity: 0.1;">
                        <rect x="159.52" y="175" width="152" height="152" rx="8"
                            transform="rotate(-45 159.52 175)" fill="white" />
                        <rect y="107.48" width="152" height="152" rx="8"
                            transform="rotate(-45 0 107.48)" fill="white" />
                    </svg>
                    <div class="relative pt-10 px-10 flex items-center justify-center">
                        <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3"
                            style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;">
                        </div>
                        <img class="relative w-40 rounded-xl" src="{{ asset('images/' . $plat->image) }}"
                            alt="">
                    </div>
                    <div class="relative text-white px-6 pb-6 mt-6">
                        <span class="block opacity-75 -mb-1">{{ $plat->category->name }}</span>
                        <div class="flex justify-between gap-4">
                            <span class="block font-semibold text-xl">{{ $plat->name }}</span>
                            <span
                                class="block bg-white rounded-full text-orange-500 text-xs font-bold px-3 py-2 leading-none flex items-center">${{ $plat->price }}</span>
                        </div>
                        <form action="{{ route('AddToCard', $plat->id) }}" method="POST">
                            @csrf
                            <button
                                class="text-white mt-4 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><i
                                    class="fa-solid fa-plus fa-xl"></i></button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("cartIcon").addEventListener("click", function() {
                document.getElementById("cartModal").classList.toggle("hidden");
                fetchCartPlats();
            });

            document.getElementById("closeModal").addEventListener("click", function() {
                document.getElementById("cartModal").classList.add("hidden");
            });
        });

        function fetchCartPlats() {
            $.ajax({
                url: "/cart/plats",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    const cartItemsElement = $("#cartItems");
                    cartItemsElement.empty();

                    const deleteFormContainer = $("<div>").addClass("flex justify-center items-center");
                    const deleteButton = $("<button>")
                        .addClass("bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded")
                        .text("Delete Selected Plats");
                    $("#confirmContainer").append(deleteButton);

                    deleteButton.click(function() {
                        const selectedPlatIds = $("input[name='plat_checkbox']:checked").map(
                            function() {
                                return $(this).val();
                            }).get();
                        deleteSelectedPlats(selectedPlatIds);
                    });
                    deleteFormContainer.append(deleteButton);

                    data.forEach(order => {
                        const platName = order.plat.name;
                        const platImage = "{{ asset('images/') }}" + '/' + order.plat.image;
                        const platPrice = order.plat.price;
                        const platId = order.plat.id;

                        const container = $("<div>").addClass(
                                "flex items-center border-b-2 border-gray-200 py-4")
                            .attr("data-plat-id", platId);

                        const checkbox = $("<input>").attr("type", "checkbox").attr("name",
                            "plat_checkbox").val(platId).addClass("mr-2");
                        const checkboxLabel = $("<label>").text("").addClass(
                            "text-sm text-gray-500");
                        const nameElement = $("<p>").addClass("text-lg font-semibold").text(platName);
                        const imageElement = $("<img>").addClass("w-16 h-16 mr-4 object-cover rounded")
                            .attr("src", platImage).attr("alt", platName + " Image");
                        const priceElement = $("<p>").addClass("text-gray-600 ml-4").text("$" +
                            platPrice);

                        container.append(
                            $("<div>").addClass("flex items-center").append(checkbox, checkboxLabel,
                                imageElement, nameElement),
                            priceElement
                        );

                        deleteFormContainer.append(container);
                    });


                    cartItemsElement.append(deleteFormContainer);
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching cart items:", error);
                },
            });
        }

        function deleteSelectedPlats(platIds) {
            $.ajax({
                url: "/cart/delete",
                type: "DELETE",
                dataType: "json",
                data: {
                    ids: platIds
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log("Plats deleted successfully:", response);
                    updateOrderCount();
                    fetchCartPlats();
                },
                error: function(xhr, status, error) {
                    console.error("Error deleting ashbi:", error);
                },
            });
        }

        $(document).ready(function() {
            fetchCartPlats();
        });

        function updateOrderCount() {
            $.ajax({
                url: "/count",
                type: "GET",
                dataType: "json",
                success: function(response) {
                    const orderCount = response.orderCount;
                    $("#orderCount").text(orderCount);
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching order count:", error);
                }
            });
        }

        updateOrderCount();

        function confirmOrder() {
            const platIds = [];
            const cartItems = document.querySelectorAll("#cartItems > div");
            cartItems.forEach(item => {
                const platId = item.dataset.platId;
                platIds.push(platId);
                console.log(platIds)
            });

            $.ajax({
                url: "/confirm/order",
                type: "POST",
                dataType: "json",
                data: {
                    platIds: platIds
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log("Order confirmed successfully:", response);
                },
                error: function(xhr, status, error) {
                    console.error("Error confirming order:", error);
                    cartItems.forEach(item => {
                        const platId = item.dataset.platId;
                        platIds.push(platId);
                        console.log(platIds)
                    });
                },
            });
        }

        document.getElementById("confirmButton").addEventListener("click", confirmOrder);
    </script>
</body>


</html>
