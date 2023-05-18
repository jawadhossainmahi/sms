    <!-- footer  -->
    <footer style="background:url(img/6.jpg) center/cover no-repeat;">
        <div class="py-5 text-white">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <h4>Useful Links</h4>
                        <ul class="fa-ul">
                            <li><i class="fa-li fa fa-angle-right"></i>Home</li>
                            <li><i class="fa-li fa fa-angle-right"></i>About</li>
                            <li><i class="fa-li fa fa-angle-right"></i>asdf</li>
                            <li><i class="fa-li fa fa-angle-right"></i>asdf</li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <h4>Useful Links</h4>
                        <div class="row">
                            <div class="col-1">
                                <span class="fa-stack">
                                    <i class="fa fa-circle fa-stack-2x"></i><i class="fab fa-facebook-f fa-stack-1x fa-inverse text-dark"></i>
                            </div>
                            <div class="col-1">
                                <span class="fa-stack">
                                    <i class="fa fa-circle fa-stack-2x"></i><i class="fab fa-instagram fa-stack-1x fa-inverse text-dark"></i>
                            </div>
                            <div class="col-1">
                                <span class="fa-stack">
                                    <i class="fa fa-circle fa-stack-2x"></i><i class="fab fa-twitter fa-stack-1x fa-inverse text-dark"></i>
                            </div>
                            <div class="col-1">
                                <span class="fa-stack">
                                    <i class="fa fa-circle fa-stack-2x"></i><i class="fab fa-youtube fa-stack-1x fa-inverse text-dark"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h4>Subscribe Now</h4>
                        <form action="">
                            <div class="md-form">
                                <input type="email" id="email-s" class="form-control"><label for="email-s">Your Email</label>
                            </div>
                            <button class="btn btn-outline-secondary btn-sm btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <section class="py-2 bg-dark text-center text-light ">
        <div class="container-fluid">
            Copyright 2023 All Rights Reserved. <a href="#main-index">School Management System</a>
        </div>
    </section>




    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>
<!-- 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        let load_more = document.querySelector(".courses .row .btn");
        let currenttime = 3;

        load_more.onclick = () => {
            let boxes = [...document.querySelectorAll(".courses .row .col")]
            for (let i = currenttime; i < currenttime + 3; i++) {
                boxes[i].style.display = 'inline-block';
            }
            currenttime += 3;
            if (currenttime >= boxes.length) {
                load_more.style.display = 'none';

            }

        }
    </script>
    </body>

    </html>