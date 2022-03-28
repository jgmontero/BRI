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
    /* new Swiper('.clients-slider', {
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
     });*/

    /**
     * Porfolio isotope and filter
     */


    window.addEventListener('load', () => {

        let studiesContainer = select('.studies-container');
        //console.log('studiesContainer');

        if (studiesContainer) {
            let portfolioIsotope = new Isotope(studiesContainer, {
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
    /*const portfolioLightbox = GLightbox({
        selector: '.portfolio-lightbox'
    });*/

    /**
     * Portfolio details slider
     */
    /*  new Swiper('.portfolio-details-slider', {
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
      });*/

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

function BDateRangeToggle() {
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

function ClearfilterUser() {
    document.getElementById("email").value = "";
    document.getElementById("f_name").value = "";
    document.getElementById("l_name").value = "";
    document.getElementById("city").value = "";
    document.getElementById("state").value = "";
    document.getElementById("country").value = "";
    // ranged end birth inputs for reset on display none
    document.getElementById("b_date_range_min_input").value = "";
    document.getElementById("b_date_range_max_input").value = "";
    document.getElementById("b_date_input").value = "";

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
        text: "If you want to update your email, you also should update your pass",
        icon: "info",
        //buttons: true,
    })
        .then((isOkay) => {

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
        });
    return false;
}

/**
 * @return {boolean}
 */
function CheckLogin(form) {

    const pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    // var pass = form.pass.value;
    if (form.email.value == "") {
        swal({
            title: "User Empty",
            text: "The user cannot be empty!!",
            icon: "error",
            buttons: true,
        })
            .then((isOkay) => {
                if (isOkay) {
                    form.email.focus();
                }
            });
        return false;
    } else if (form.pass.value == "") {
        swal({
            title: "Password Empty!!!",
            text: "The password cannot be empty!!",
            icon: "error",
            buttons: true,
        })
            .then((isOkay) => {
                if (isOkay) {
                    form.pass.focus();
                }
            });
        return false;
    } else if (!pattern.test(form.email.value.toLowerCase())) {
        swal({
            title: "Invalid email format!!",
            text: "The email should have this format user@emailprovider.domain !!",
            icon: "error",
            buttons: true,
        })
            .then((isOkay) => {
                if (isOkay) {
                    form.email.focus();
                }
            });
        return false;
    }

   /* var data = new FormData();
    data.append('email', form.email.value);
    data.append('pass', form.pass.value);
    var url = "../backend/credentials_validation.php";
    var xhr = new XMLHttpRequest();
    var wrongUserPass = document.getElementById("wrongUserPass");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            // console.log('xhr.readyState == 4');
            if (xhr.status === 200) {
                console.log(JSON.parse(this.response));
                if (JSON.parse(this.response) === "false") {
                    wrongUserPass.setAttribute('display','block');
                    return false;
                }
            } else {
                wrongUserPass.setAttribute('display','none');
                console.log('error ' + xhr.status);
            }
        }
    };

    xhr.open("POST", url, true);
    xhr.send(data);*/

}

function CheckForgotPassword(form) {

    const pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    // var pass = form.pass.value;
    if (form.email.value == "") {
        swal({
            title: "User Empty",
            text: "The user cannot be empty!!",
            icon: "error",
            buttons: true,
        })
            .then((isOkay) => {
                if (isOkay) {
                    form.email.focus();
                }
            });
        return false;
    } else if (!pattern.test(form.email.value.toLowerCase())) {
        swal({
            title: "Invalid email format!!",
            text: "The email should have this format user@emailprovider.domain !!",
            icon: "error",
            buttons: true,
        })
            .then((isOkay) => {
                if (isOkay) {
                    form.email.focus();
                }
            });
        return false;
    }
}

function CheckRegister(form) {

    const pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();

    if (dd < 10) {
        dd = '0' + dd;
    }

    if (mm < 10) {
        mm = '0' + mm;
    }
    var today = new Date(mm + '/' + dd + '/' + yyyy);
    var hft = form.heightft.value;
    var regex = /^(?!\s*$)(?:(?!0+')\d+')?(?: *(?!0+")\d+")?(?: *(?!0+\/)\d+\/(?!0+$)\d+)?$/;
    var phoneregex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
    var phoneNumber = form.phoneN.value;
    var zipCodeRegex = /(^\d{5}$)|(^\d{9}$)|(^\d{5}-\d{4}$)/;

    if (!pattern.test(form.email.value.toLowerCase())) {
        swal({
            title: "Invalid email format!!",
            text: "The email should have this format user@emailprovider.domain !!",
            icon: "error",
            buttons: true,
        })
            .then((isOkay) => {
                if (isOkay) {
                    form.email.focus();
                }
            });
        return false;
    } else if (form.pass.value == "") {
        swal({
            title: "Password Empty!!!",
            text: "The password cannot be empty!!",
            icon: "error",
            buttons: true,
        })
            .then((isOkay) => {
                if (isOkay) {
                    form.pass.focus();
                }
            });
        return false;
    } else if (form.pass_confirm.value == "") {
        swal({
            title: "Password Empty!!!",
            text: "The password cannot be empty!!",
            icon: "error",
            buttons: true,
        })
            .then((isOkay) => {
                if (isOkay) {
                    form.pass_confirm.focus();
                }
            });
        return false;
    } else if (form.pass.value != form.pass_confirm.value) {
        swal({
            title: "Passwords mismatch!!!",
            text: "The password and the confirmation are different!!",
            icon: "error",
            buttons: true,
        })
            .then((isOkay) => {
                if (isOkay) {
                    form.pass.focus();
                }
            });
        return false;
    } else if (new Date(form.date_of_birth.value) > today) {

        swal({
            title: "Wrong birth date!!",
            text: "The birth date cannot be in the future !!",
            icon: "error",
            buttons: true,
        })
            .then((isOkay) => {
                if (isOkay) {
                    form.date_of_birth.focus();
                }
            });
        return false;
    } else if (form.weightKG.value < 0) {
        swal({
            title: "Wrong weight format!!",
            text: "The weight cannot be negative o zero !!",
            icon: "error",
            buttons: true,
        })
            .then((isOkay) => {
                if (isOkay) {
                    form.weightKG.focus();
                }
            });
        return false;
    } else if (!hft.match(regex)) {
        swal({
            title: "Wrong height format!!",
            text: "The introduced height has an invalid format !!",
            icon: "error",
            buttons: true,
        })
            .then((isOkay) => {
                if (isOkay) {
                    form.heightft.focus();
                }
            });
        return false;
    } else if (!(phoneNumber).match(phoneregex)) {
        swal({
            title: "Wrong phone number format!!",
            text: "The introduced phone number has an invalid format !!",
            icon: "error",
            buttons: true,
        })
            .then((isOkay) => {
                if (isOkay) {
                    form.phoneN.focus();
                }
            });
        return false;
    } else if (!(form.zip_code.value).match(zipCodeRegex)) {
        swal({
            title: "Wrong zip code number format!!",
            text: "The introduced zip code has an invalid format !!",
            icon: "error",
            buttons: true,
        })
            .then((isOkay) => {
                if (isOkay) {
                    form.zip_code.focus();
                }
            });
        return false;
    }
    ``


}

function CheckStudy(form) {
    var SDate = new Date(form.s_date.value);
    var EDate = new Date(form.e_date.value);

    if (SDate >= EDate) {
        swal({
            title: "Wrong dates!!!",
            text: "The start date can not be older or equal than the end date!!",
            icon: "error",
            // buttons: true,
            // dangerMode: true,
        })
            .then((isOkay) => {

                form.s_date.focus();

            });
        return false;
    }

    if (form.g_number.value <= 0) {
        swal({
            title: "Wrong group number!!!",
            text: "The group number can not be 0 or lower!!",
            icon: "error",
            // buttons: true,
            // dangerMode: true,
        })
            .then((isOkay) => {

                form.g_number.focus();

            });
        return false;
    }

    if (form.stipend.value <= 0) {
        swal({
            title: "Wrong stipend amount!!!",
            text: "The stipend amount can not be 0 or lower!!",
            icon: "error",
            // buttons: true,
            // dangerMode: true,
        })
            .then((isOkay) => {

                form.stipend.focus();

            });
        return false;
    }

    if (form.phaseS.value <= 0) {
        swal({
            title: "Wrong phase!!!",
            text: "The phase can not be 0 or lower!!",
            icon: "error",
            // buttons: true,
            // dangerMode: true,
        })
            .then((isOkay) => {

                form.phaseS.focus();

            });
        return false;
    }

    if (form.min_age.value < 0 || form.max_age.value < 0) {
        swal({
            title: "Wrong age input!!!",
            text: "The age can not be 0 or lower!!",
            icon: "error",
            // buttons: true,
            // dangerMode: true,
        })
            .then((isOkay) => {

                form.min_age.focus();

            });
        return false;
    }

    console.log('Age min');
    console.log(form.min_age.value);
    console.log('Age max');
    console.log(form.max_age.value);

    if ((form.min_age.value - form.max_age.value)>=0 ) {

        swal({
            title: "Wrong age input!!!",
            text: "The minimum age can not be bigger than maximum age !!",
            icon: "error",
            // buttons: true,
            // dangerMode: true,
        })
            .then((isOkay) => {

                form.min_age.focus();

            });
        return false;
    }
    if (form.b_draws.value < 0) {
        swal({
            title: "Wrong blood draws amount!!!",
            text: "The blood draws amount can not be lower than 0!!",
            icon: "error",
            // buttons: true,
            // dangerMode: true,
        })
            .then((isOkay) => {

                form.b_draws.focus();

            });
        return false;
    }

    if (form.actionF.value == 'upt') {
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
    if (form.actionF.value == 'add') {

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
}


function flipCard(element) {
    var front_square = element.childNodes[1];
    var front_square_container = front_square.childNodes[1];
    var back_square = element.childNodes[3];
    var back_square_container = back_square.childNodes[1];
    back_square.classList.toggle('square');
    back_square.classList.toggle('square2');
    front_square.classList.toggle('square');
    front_square.classList.toggle('square2');
    back_square_container.classList.toggle('square-container2');
    back_square_container.classList.toggle('square-container');
    front_square_container.classList.toggle('square-container');
    front_square_container.classList.toggle('square-container2');
}





