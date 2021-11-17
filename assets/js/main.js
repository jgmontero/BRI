/**
 * Template Name: Gp - v4.6.0
 * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
 * Author: BootstrapMade.com
 * License: https://bootstrapmade.com/license/
 */
(function () {
    "use strict";

    /**
     * Easy selector helper function
     */
    const select = (el, all = false) => {
        el = el.trim()
        if (all) {
            return [...document.querySelectorAll(el)]
        } else {
            return document.querySelector(el)
        }
    }

    /**
     * Easy event listener function
     */
    const on = (type, el, listener, all = false) => {
        let selectEl = select(el, all)
        if (selectEl) {
            if (all) {
                selectEl.forEach(e => e.addEventListener(type, listener))
            } else {
                selectEl.addEventListener(type, listener)
            }
        }
    }

    /**
     * Easy on scroll event listener
     */
    const onscroll = (el, listener) => {
        el.addEventListener('scroll', listener)
    }

    /**
     * Navbar links active state on scroll
     */
    let navbarlinks = select('#navbar .scrollto', true)
    const navbarlinksActive = () => {
        let position = window.scrollY + 200
        navbarlinks.forEach(navbarlink => {
            if (!navbarlink.hash) return
            let section = select(navbarlink.hash)
            if (!section) return
            if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
                navbarlink.classList.add('active')
            } else {
                navbarlink.classList.remove('active')
            }
        })
    }
    window.addEventListener('load', navbarlinksActive)
    onscroll(document, navbarlinksActive)

    /**
     * Scrolls to an element with header offset
     */
    const scrollto = (el) => {
        let header = select('#header')
        let offset = header.offsetHeight

        let elementPos = select(el).offsetTop
        window.scrollTo({
            top: elementPos - offset,
            behavior: 'smooth'
        })
    }

    /**
     * Toggle .header-scrolled class to #header when page is scrolled
     */
    let selectHeader = select('#header')
    if (selectHeader) {
        const headerScrolled = () => {
            if (window.scrollY > 100) {
                selectHeader.classList.add('header-scrolled')
            } else {
                selectHeader.classList.remove('header-scrolled')
            }
        }
        window.addEventListener('load', headerScrolled)
        onscroll(document, headerScrolled)
    }

    /**
     * Back to top button
     */
    let backtotop = select('.back-to-top')
    if (backtotop) {
        const toggleBacktotop = () => {
            if (window.scrollY > 100) {
                backtotop.classList.add('active')
            } else {
                backtotop.classList.remove('active')
            }
        }
        window.addEventListener('load', toggleBacktotop)
        onscroll(document, toggleBacktotop)
    }

    /**
     * Mobile nav toggle
     */
    on('click', '.mobile-nav-toggle', function (e) {
        select('#navbar').classList.toggle('navbar-mobile')
        this.classList.toggle('bi-list')
        this.classList.toggle('bi-x')
    })

    /**
     * Mobile nav dropdowns activate
     */
    on('click', '.navbar .dropdown > a', function (e) {
        if (select('#navbar').classList.contains('navbar-mobile')) {
            e.preventDefault()
            this.nextElementSibling.classList.toggle('dropdown-active')
        }
    }, true)

    /**
     * Scrool with ofset on links with a class name .scrollto
     */
    on('click', '.scrollto', function (e) {
        if (select(this.hash)) {
            e.preventDefault()

            let navbar = select('#navbar')
            if (navbar.classList.contains('navbar-mobile')) {
                navbar.classList.remove('navbar-mobile')
                let navbarToggle = select('.mobile-nav-toggle')
                navbarToggle.classList.toggle('bi-list')
                navbarToggle.classList.toggle('bi-x')
            }
            scrollto(this.hash)
        }
    }, true)

    /**
     * Scroll with ofset on page load with hash links in the url
     */
    window.addEventListener('load', () => {
        if (window.location.hash) {
            if (select(window.location.hash)) {
                scrollto(window.location.hash)
            }
        }
    });

    /**
     * Preloader
     */
    let preloader = select('#preloader');
    if (preloader) {
        window.addEventListener('load', () => {
            preloader.remove()
        });
    }

    /**
     * Clients Slider
     */
    new Swiper('.clients-slider', {
        speed: 400,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        slidesPerView: 'auto',
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        },
        breakpoints: {
            320: {
                slidesPerView: 2,
                spaceBetween: 40
            },
            480: {
                slidesPerView: 3,
                spaceBetween: 60
            },
            640: {
                slidesPerView: 4,
                spaceBetween: 80
            },
            992: {
                slidesPerView: 6,
                spaceBetween: 120
            }
        }
    });

    /**
     * Porfolio isotope and filter
     */

    window.addEventListener('load', () => {
        const filter = document.querySelector("#portfolio-flters").children;
        const items = document.querySelector(".studies").children;
        for (let i = 0; i < filter.length; i++) {
            filter[i].addEventListener("click", function () {
                for (let j = 0; j < filter.length; j++) {
                    filter[j].classList.remove("active")
                }
                this.classList.add("active");
                const target = this.getAttribute("data-target");

                for (let k = 0; k < items.length; k++) {

                    if (target == items[k].children[0].getAttribute("data-id")) {
                        items[k].style.display = "flex";
                    } else if (target == "*") {
                        items[k].style.display = "flex";
                    } else {
                        items[k].style.display = "none";
                    }
                }
            })
        }

    });


    window.addEventListener('load', () => {
        let portfolioContainer = select('.portfolio-container');

        if (portfolioContainer) {
            let portfolioIsotope = new Isotope(portfolioContainer, {
                itemSelector: '.portfolio-item'
            });

            let portfolioFilters = select('#portfolio-flters li', true);

            on('click', '#portfolio-flters li', function (e) {
                e.preventDefault();
                portfolioFilters.forEach(function (el) {
                    //console.log(el);
                    el.classList.remove('filter-active');
                    //console.log(el);
                });
                //console.log(portfolioFilters);

                this.classList.add('filter-active');

                //console.log(this);

                portfolioIsotope.arrange({
                    filter: this.getAttribute('data-filter')
                });
                //console.log(portfolioIsotope);
                portfolioIsotope.on('arrangeComplete', function () {
                    AOS.refresh()
                });
            }, true);
        }

    });


    /**
     * Initiate portfolio lightbox
     */
    const portfolioLightbox = GLightbox({
        selector: '.portfolio-lightbox'
    });

    /**
     * Portfolio details slider
     */
    new Swiper('.portfolio-details-slider', {
        speed: 400,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        }
    });

    /**
     * Testimonials slider
     */
    new Swiper('.testimonials-slider', {
        speed: 600,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        slidesPerView: 'auto',
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        }
    });

    /**
     * Animation on scroll
     */
    window.addEventListener('load', () => {
        AOS.init({
            duration: 1000,
            easing: "ease-in-out",
            once: true,
            mirror: false
        });
    });

})()

function ShowHideAddCourse() {
    var x = document.getElementById("add_studies");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function submitFormDelete(form) {
    swal({
        title: "Are you sure?",
        text: "This row will be deleted",
        icon: "warning",
        closeOnClickOutside: false,
        buttons: true,
        dangerMode: true,
        closeOnEsc: false,

    })
        .then((isOkay) => {
            if (isOkay) {
                form.submit();
            }
        });
    return false;
}

function submitFormUpt(form) {
    // console.log(form);

    swal({
        title: "Change the desired values",
        text: "This row will be Updated",
        icon: "info",
        buttons: true,
    })
        .then((isOkay) => {
            if (isOkay) {
                form.submit();
            }
        });
    return false;
}

function Uptstudy(form) {
    // console.log(form);

    swal({
        title: "Update study",
        text: "This study will be Updated",
        icon: "info",
        buttons: true,
    })
        .then((isOkay) => {
            if (isOkay) {
                form.submit();
            }
        });
    return false;
}

function submitFormAdd(form) {
    //   console.log(form);

    swal({
        title: "Do you want to add a new study?",
        text: "A new study will be added",
        icon: "info",
        buttons: true,
    })
        .then((isOkay) => {
            if (isOkay) {
                form.submit();
            }
        });
    return false;
}

function BDateRangeToggle(){
    // div container ranged date
    var b_date_range = document.getElementById("b_date_range");
    // ranged date inputs for reset on display none
    var b_date_range_min_input = document.getElementById("b_date_range_min_input");
    var b_date_range_max_input = document.getElementById("b_date_range_max_input");

    // div container no ranged date
    var b_date = document.getElementById("b_date");
    // no ranged date inputs for reset on display none
    var b_date_input = document.getElementById("b_date_input");

    var checboxrange = document.getElementById("is_b_date_range");

    if (checboxrange.checked) {
        b_date_range.style.display = "block";
        b_date.style.display = "none";
        b_date_input.value = "";

    } else {
        b_date_range.style.display = "none";
        b_date_range_min_input.value = "";
        b_date_range_max_input.value = "";
        b_date.style.display = "block";
    }
}
function StartDateRangeToggle() {
    // div container ranged date
    var s_date_range = document.getElementById("s_date_range");
    // ranged date inputs for reset on display none
    var s_date_range_min_input = document.getElementById("s_date_range_min_input");
    var s_date_range_max_input = document.getElementById("s_date_range_max_input");

    // div container no ranged date
    var s_date_no_range = document.getElementById("s_date_no_range");
    // no ranged date inputs for reset on display none
    var s_date_no_range_input = document.getElementById("s_date_no_range_input");

    var checboxrange = document.getElementById("is_start_range");

    if (checboxrange.checked) {
        s_date_range.style.display = "block";
        s_date_no_range.style.display = "none";
        s_date_no_range_input.value = "";

    } else {
        s_date_range.style.display = "none";
        s_date_range_min_input.value = "";
        s_date_range_max_input.value = "";
        s_date_no_range.style.display = "block";
    }
}

function EndDateRangeToggle() {
    // div container ranged date
    var e_date_range = document.getElementById("e_date_range");
    // ranged date inputs for reset on display none
    var e_date_range_min_input = document.getElementById("e_date_range_min_input");
    var e_date_range_max_input = document.getElementById("e_date_range_max_input");
    // div container no ranged date
    var e_date_no_range = document.getElementById("e_date_no_range");
    // no ranged date inputs for reset on display none
    var e_date_no_range_input = document.getElementById("e_date_no_range_input");


    var checboxrange = document.getElementById("is_end_range");
    if (checboxrange.checked) {
        e_date_range.style.display = "block";
        e_date_no_range.style.display = "none";
        e_date_no_range_input.value = "";
    } else {
        e_date_range.style.display = "none";
        e_date_no_range.style.display = "block";
        e_date_range_min_input.value = "";
        e_date_range_max_input.value = "";
    }
}

function StipendRangeToggle() {
    // div container ranged stipend
    var stipend_range = document.getElementById("stipend_range");
    // ranged stipend inputs for reset on display none
    var stipend_range_min_input = document.getElementById("stipend_range_min_input");
    var stipend_range_max_input = document.getElementById("stipend_range_max_input");
    // div container no ranged stipend
    var stipend_no_range = document.getElementById("stipend_no_range");
    // no ranged stipend inputs for reset on display none
    var stipend_input = document.getElementById("stipend_input");


    var checboxrange = document.getElementById("is_stipend_range");
    if (checboxrange.checked) {
        stipend_range.style.display = "block";
        stipend_no_range.style.display = "none";
        stipend_input.value = "";
    } else {
        stipend_range.style.display = "none";
        stipend_no_range.style.display = "block";
        stipend_range_min_input.value = "";
        stipend_range_max_input.value = "";
    }
}

function Clearfilter() {
    document.getElementById("title").value = "";
    document.getElementById("min_age").value = "";
    document.getElementById("max_age").value = "";
    // start date range inputs
    document.getElementById("s_date_range_min_input").value = "";
    document.getElementById("s_date_range_max_input").value = "";
    // no ranged start date inputs for reset on display none
    document.getElementById("s_date_no_range_input").value = "";
    // ranged end date inputs for reset on display none
    document.getElementById("e_date_range_min_input").value = "";
    document.getElementById("e_date_range_max_input").value = "";
    // no ranged end date inputs for reset on display none
    document.getElementById("e_date_no_range_input").value = "";
    //ranged stipend
    document.getElementById("stipend_range_min_input").value = "";
    document.getElementById("stipend_range_max_input").value = "";
    // no ranged stipend inputs for reset on display none
    document.getElementById("stipend_input").value = "";
    // window.location = "../pages/courses_pages.php";
}

function submitFormAddCustomer(form) {
    //   console.log(form);

    swal({
        title: "Do you want to add a new customer?",
        text: "A new customer will be added",
        icon: "info",
        buttons: true,
    })
        .then((isOkay) => {
            if (isOkay) {
                form.submit();
            }
        });
    return false;
}

function submitFormAdmin(form) {
    swal({
        title: "Make this user admin?",
        text: "This user will be admin",
        icon: "info",
        buttons: true,
    })
        .then((isOkay) => {
            if (isOkay) {
                //console.log(form);
                form.submit();
            }
        });
    return false;
}
function submitFormAdminDenied(form) {
    swal({
        title: "Admin privileges remove request denied!",
        text: "This user has root privileges and cannot lose it!",
        icon: "error",
        buttons: true,
    })
        .then((isOkay) => {
            if (isOkay) {
            }
        });
    return false;
}

function UpdatePassToggle() {
    // div container ranged stipend
    var passdiv = document.getElementById("upt_pass_div");
    // pass inputs for reset on display none
    var password_field = document.getElementById("pass_input");
    var confirm_pass = document.getElementById("confirm_pass_input");


    var checboxemail = document.getElementById("update_email_chkbox");
    var checboxpass = document.getElementById("update_pass_chkbox");
    if (checboxpass.checked) {
        passdiv.style.display = "block";
        password_field.value = "";
        confirm_pass.value = "";
    } else {
        passdiv.style.display = "none";
        password_field.value = "";
        confirm_pass.value = "";
    }
}

function UpdateEmailToggle() {
    swal({
        title: "Password also should be updated",
        text: "If you want yo update your email, you also should update your pass",
        icon: "info",
        buttons: true,
    })
        .then((isOkay) => {
            if (isOkay) {
                var emaildiv = document.getElementById("upt_email_div");

                //markin checkbox
                var checboxpass = document.getElementById("update_pass_chkbox");
                checboxpass.click();
               var chkboxpasslabel = document.getElementById("update_pass_chkbox_label");
                //email chk ativate
                var checboxemail = document.getElementById("update_email_chkbox");

                if (checboxemail.checked) {
                    emaildiv.style.display = "block";
                    checboxpass.style.display = "none";
                    chkboxpasslabel.style.display = "none";
                } else {
                    emaildiv.style.display = "none";
                    chkboxpasslabel.style.display = "inline";
                    checboxpass.style.display = "inline";

                }
            }
        });
    return false;
}