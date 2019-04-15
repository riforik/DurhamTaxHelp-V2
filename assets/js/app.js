// const GO_BTN = document.querySelector('body .map-list-option');
const CONVERSION = document.querySelector('body .landing-page .conversion');
const CALCULATE = document.querySelector('body .landing-page .calculate');


(function($) {

    // Initialize Slick Slider
    $(document).ready(function() {


        //  === C A C L C U L A T E ===
        // after establishing the value of user input we can convert and
        // change the content to valid or non valid amount
        CALCULATE.addEventListener('click', function() {

            // get input every click
            let userInp = document.querySelector('body .landing-page .userInp');

            // take input innerHTML
            let userNum = userInp.value;
            console.log(userNum);

            if (isPosNum(userNum) !== true) {
                CONVERSION.innerHTML = `Please enter a valid number.`;
            } else {
                if (userNum <= 30000) {
                    CONVERSION.innerHTML = `$${userNum} is a qualified income!`;
                } else {
                    CONVERSION.innerHTML = `Sorry, $${userNum} is too high an income.`;
                }
                userInp.value = "";
            }

        });

        // is calculation input positive
        function isPosNum(num) {
            return !isNaN(num) && num > 0;
        }

        // Hide Calebs Parts
        $("#article_box02").hide();
        $("#article_box03").hide();


        // === L E A F L E T   M A P ===
        var mymap = L.map('leafletMap').setView([43.848900, -79.020986], 16);

        // Map settings
        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 17,
            minZoom: 14,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox.streets'
        }).addTo(mymap);

        // Create new array to store data locations and their popUp structure
        let locations = [];

        // For all location items, add them to a location array with different map options...
        // - Take the dataLocations and use the values to assign popUp structure

        let locArr = []; // locations array
        // get locations
        let locArr2 = document.querySelectorAll(".locationsArray"); // string object of posts
        // let locArr = $(".locationsArray");
        // console.log($(".locationsArray"));
        // console.log(locArr2);
        // console.log(locArr[0].innerText);

        for (var i = 0; i < locArr2.length; i++) {
            // turn string to object
            locArr.push(JSON.parse(locArr2[i].innerText));

            // parse long and lat to numbers
            locArr[i].location.longitude = parseFloat(locArr[i].location.longitude);
            locArr[i].location.latitude = parseFloat(locArr[i].location.latitude);

            // show new object values
            // console.log(locArr[i].location);
        }
        // locArr2.forEach(function(i) {
        //     locArr.push(JSON.parse(locArr2[i].innerText))
        // });

        // console.log(locArr); // array of locations
        // let locJSON = JSON.parse(locArr2[0].innerText);
        // console.log(locJSON.location);




        for (i = 0; i < locArr.length; i++) {
            // locations lat & long
            let longAndLat = [locArr[i].location.latitude, locArr[i].location.longitude];

            // show values
            // console.log(longAndLat);

            locations[i] = L.marker(longAndLat).addTo(mymap);
            locations[i].bindPopup(`<div id="hotel${i}">
      <h4>${locArr[i].location.name}</h4>
      <h5>${locArr[i].location.Address}</h5>
      <h6>${locArr[i].location.information}</63>
      </div>`);
        }

        // Sample circle
        // L.circle([43.849875, -79.035955], 250, {
        //   color: 'red',
        //   fillColor: '#f03',
        //   fillOpacity: 0.5
        // }).addTo(mymap).bindPopup("I am a circle.");

        // Sample Polygon
        // L.polygon([
        //   [43.847079, -79.021547],
        //   [43.846071, -79.019101],
        //   [43.848038, -79.018435]
        // ]).addTo(mymap).bindPopup("I am a polygon.");


        var popup = L.popup();

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("You clicked the map at " + e.latlng.toString())
                .openOn(mymap);
        }

        mymap.on('click', onMapClick);

        // Initialize map to first location items
        // center view to the first location
        locations[0].openPopup();
        mymap
            .setView(new L.LatLng(locArr[0].location.latitude, locArr[0].location.longitude), 16, {
                animation: true
            });

        // Send list of locations to screen
        let content = "";
        for (var i = 0; i < locations.length; i++) {
            // activate first item
            if (i === 0) {
                content +=
                    `<div class="map-list-option active" data-id="${locArr[i].location.id}" data-name='${locArr[i].location.id}' id='${locArr[i].location.id}'>
                    <h3>${locArr[i].location.name}</h3>
                    <h4>${locArr[i].location.Address}</h4>
                    </div>`;
            } else {
                content +=
                    `<div class="map-list-option" data-id="${locArr[i].location.id}"
                    data-name='${locArr[i].location.id}' id='${locArr[i].location.id}'>
                    <h3>${locArr[i].location.name}</h3>
                    <h4>${locArr[i].location.Address}</h4>
                    </div>`;
            }

        }

        $("#map-list").html(content);

        // add active to first item
        $('body #DivFinGrp').attr('class', 'map-list-option active');

        // -------     C O N T R O L L E R     -------
        $(document).on("click", "body .map-list-option", function(e) {
            $('body .map-list-option').attr('class', 'map-list-option');
            $(this).attr('class', 'map-list-option active');
            content = "";
            var id = $(this).attr("data-id");
            // console.log(locArr[id].location);
            var name = $(this).attr("data-name");
            // console.log(`ID: ${id}\nName: ${name}`);

            content = `<h3>${locArr[id].location.name}</h3>
            <h4>${locArr[id].location.Address}</h4>
            <p>${locArr[id].location.information}</p>`;
            doMoveMap(id, mymap, name, locations, locArr);


            $("#map-info").html(content);
        });

        // set the content to first item
        $("#map-info").html(`<h3>${locArr[0].location.name}</h3>
        <h4>${locArr[0].location.Address}</h4>
        <p>${locArr[0].location.information}</p>`);

        function doMoveMap(id, mymap, clinic, locations, locArr) {
            locations[id].openPopup();
            console.log(`ID(96): ${id}`);
            // console.log(locations[id]._popup.openPopup());

            // console.log(locArr[id].location.longitude, locArr[id].location.latitude);
            mymap
                .setView(new L.LatLng(parseFloat(locArr[id].location.latitude), locArr[id].location.longitude), 16, {
                    animation: true
                });
        }




        (function animateIntro() {

            $("#main_site_title").delay(250).animate({
                opacity: 1
            }, 500);

            $(".fadeOn").delay(500).animate({
                opacity: 1
            }, 250);

            let t1 = new TimelineMax({
                delay: 1,
                repeat: -1,
                ease: Power1.easeOut
            });

            t1.to("#main_img_chara1", 1, {
                    opacity: 0,
                    delay: 1
                })
                .to("#main_img_chara2", 1, {
                    opacity: 1
                })
                .to("#main_img_chara2", 1, {
                    opacity: 0,
                    delay: 2
                })
                .to("#main_img_chara3", 1, {
                    opacity: 1
                })
                .to("#main_img_chara3", 1, {
                    opacity: 0,
                    delay: 2
                })
                .to("#main_img_chara4", 1, {
                    opacity: 1
                })
                .to("#main_img_chara4", 1, {
                    opacity: 0,
                    delay: 2
                })
                .to("#main_img_chara1", 1, {
                    opacity: 1
                });



        })();

        // FINANCIAL EMPOWERMENT
        $("#cost").hide();
        $("#credit").hide();
        $("#overview").show();
        $("#tax").hide();
        $("#bond").hide();
        $("#arrow1").hide();
        $("#arrow2").hide();
        $("#arrow3").hide();
        $("#arrow4").hide();

        $(".one").click(function() {

            $("#cost").show();
            $("#overview").hide();
            $("#credit").hide();
            $("#tax").hide();
            $("#bond").hide();
            $("#arrow1").show();
            $("#arrow2").hide();
            $("#arrow3").hide();
            $("#arrow4").hide();


        });
        $(".two").click(function() {

            $("#credit").show();
            $("#overview").hide();
            $("#cost").hide();
            $("#tax").hide();
            $("#bond").hide();
            $("#arrow2").show();
            $("#arrow1").hide();
            $("#arrow3").hide();
            $("#arrow4").hide();

        });
        $(".three").click(function() {

            $("#tax").show();
            $("#overview").hide();
            $("#cost").hide();
            $("#credit").hide();
            $("#bond").hide();
            $("#arrow3").show();
            $("#arrow2").hide();
            $("#arrow4").hide();
            $("#arrow1").hide();

        });
        $(".four").click(function() {

            $("#bond").show();
            $("#overview").hide();
            $("#cost").hide();
            $("#credit").hide();
            $("#tax").hide();
            $("#arrow4").show();
            $("#arrow3").hide();
            $("#arrow2").hide();
            $("#arrow1").hide();

        });

        $(".navbar a, .navbar li,.menu").click(function() {

            if ($(this).attr("data-click-state") == 1) {


                $(this).attr("data-click-state", 0);

                TweenMax.to(".slide-right", 0.5, {
                    x: 0,
                    ease: Sine.easeOut

                });

            } else {

                $(this).attr("data-click-state", 1);



                TweenMax.to(".slide-right", 0.5, {
                    x: -500,
                    ease: Sine.easeOutS


                });
            }


        });

        // HOW TO QUALIFY
        $(function() {

            $("#eligible_btn").addClass("qualify_button_selected");

            $("#eligible_btn").click(function() {
                $("#article_box01").fadeIn();
                $("#article_box02").fadeOut();
                $("#article_box03").fadeOut();

                $("#eligible_btn").addClass("qualify_button_selected");
                $("#eligible_btn").removeClass("qualify_button_deselected");

                $("#receipts_btn").addClass("qualify_button_deselected");
                $("#receipts_btn").removeClass("qualify_button_selected");

                $("#infoSlips_btn").addClass("qualify_button_deselected");
                $("#infoSlips_btn").removeClass("qualify_button_selected");

            });



            $("#receipts_btn").click(function() {
                // Remove Classes

                $("#article_box01").fadeOut();
                $("#article_box02").fadeIn();
                $("#article_box03").fadeOut();

                $("#receipts_btn").addClass("qualify_button_selected");
                $("#receipts_btn").removeClass("qualify_button_deselected");

                $("#eligible_btn").addClass("qualify_button_deselected");
                $("#eligible_btn").removeClass("qualify_button_selected");

                $("#infoSlips_btn").addClass("qualify_button_deselected");
                $("#infoSlips_btn").removeClass("qualify_button_selected");


            });


            $("#infoSlips_btn").click(function() {
                $("#article_box01").fadeOut();
                $("#article_box02").fadeOut();
                $("#article_box03").delay(100).fadeIn();

                $("#infoSlips_btn").addClass("qualify_button_selected");
                $("#infoSlips_btn").removeClass("qualify_button_deselected");

                $("#eligible_btn").addClass("qualify_button_deselected");
                $("#eligible_btn").removeClass("qualify_button_selected");

                $("#receipts_btn").addClass("qualify_button_deselected");
                $("#receipts_btn").removeClass("qualify_button_selected");
            });

        });

    });





    // N A V   C O N T R O L L E R

    $('.title-bar, #menu-main-navigation li').click(function() {
        // get the menu
        let menu = document.querySelector('.row .top-bar');

        // if menu is opened
        if (menu.classList.contains("opened")) {
            $('.top-bar')
                .removeClass("opened")
                .slideUp(1000);

            $("#masthead nav")
                .animate({
                    width: '40px'
                }, 1000);

            $(".title-bar")
                .removeClass("opened");

            $(".title-bar-title")
                .fadeOut(1000);


        } else {
            $('.top-bar')
                .css('height', '100vh')
                .addClass("opened")
                .slideDown(1000);

            $("#masthead nav")
                .animate({
                    width: '50%',
                }, 1000);

            $(".title-bar")
                .addClass("opened");

            $(".title-bar-title")
                .fadeIn(1000);

        }

    });

    // list items
    const li1 = document.querySelector('#menu-main-navigation li:nth-child(1) a'),
        li2 = document.querySelector('#menu-main-navigation li:nth-child(2) a'),
        li3 = document.querySelector('#menu-main-navigation li:nth-child(3) a'),
        li4 = document.querySelector('#menu-main-navigation li:nth-child(4) a'),
        li5 = document.querySelector('#menu-main-navigation li:nth-child(5) a'),
        li6 = document.querySelector('#menu-main-navigation li:nth-child(6) a'),
        li7 = document.querySelector('#menu-main-navigation li:nth-child(7) a');

    // list content
    let li1_content = '<img class="icon" src="http://durham-tax-help.local/wp-content/uploads/2019/03/home_icon.png" alt="">';
    let li2_content = '<img class="icon" src="http://durham-tax-help.local/wp-content/uploads/2019/03/volunteer_icon.png" alt="">';
    let li3_content = '<img class="icon" src="http://durham-tax-help.local/wp-content/uploads/2019/03/qualify_icon.png" alt="">';
    let li4_content = '<img class="icon" src="http://durham-tax-help.local/wp-content/uploads/2019/03/locations_icon.png" alt="">';
    let li5_content = '<img class="icon" src="http://durham-tax-help.local/wp-content/uploads/2019/03/volunteer_icon.png" alt="">';
    let li6_content = '<img class="icon" src="http://durham-tax-help.local/wp-content/uploads/2019/03/financial_icon.png" alt="">';
    let li7_content = '<img class="icon" src="http://durham-tax-help.local/wp-content/uploads/2019/03/testimonial_icon.png" alt="">';

    // add icons to nav
    li1.innerHTML = li1_content + li1.innerHTML;
    li2.innerHTML = li2_content + li2.innerHTML;
    li3.innerHTML = li3_content + li3.innerHTML;
    li4.innerHTML = li4_content + li4.innerHTML;
    li5.innerHTML = li5_content + li5.innerHTML;
    li6.innerHTML = li6_content + li6.innerHTML;
    li7.innerHTML = li7_content + li7.innerHTML;



    // Financial Empowerment Controllers
    $("#sideNav li").click(function() {
        let list = document.querySelectorAll("#sideNav li"); // grab li's
        console.log(list); // show all the li's (array)

        list.forEach(function(i) {
            console.log(i); // items in array
            i.classList.remove("activeEmp"); // remove active
        })

        // add class if already active or not
        if (this.classList.contains("activeEmp")) {
            // this.classList.remove("active");
            console.log("already active");
        } else {
            this.classList.add("activeEmp");
            console.log("made active");
        }
    });

    // Testimonial cards
    const nCards = document.querySelectorAll(".testimonials-page .card");
    // console.log(nCards);



})(jQuery);