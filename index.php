<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plasama Donor</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <script src="cities.js"></script>

</head>
<style type="text/css">
    #eff {
            animation: blinker 2s linear infinite;
    }
    .icon i{
        padding: 8px
    }

@keyframes blinker {
  50% {
    opacity: 0;
  }
}
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-danger p-3">
        <div class="container text-white">
            <h4 style="color: white;">Plasma Donor</h4>
        </div>
    </nav>
    <!-- Search colom -->
    <div style="padding: 20px;">
        <div class="container">
            <form action="" method="get">
                <div class="form-row">
                    <div class="col-md-2">
                         <label for="state"><i class="fas fa-tint text-danger"></i> Blood Group</label>
                        <select name="blood" class="form-control">
                            <option>Select Blood Group</option>
                            <option >O+</option>
                            <option>O-</option>
                            <option>A+</option>
                            <option>A-</option>
                            <option>B+</option>
                            <option>B-</option>
                            <option>AB+</option>
                            <option>AB-</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="state">State</label>
                        <select onchange="print_city('state', this.selectedIndex);" id="states" name ="stt" class="form-control" required></select>
                    </div>
                    <div class="col-md-2">
                        <label for="city">City</label>
                        <select id ="state" name="city" class="form-control"></select>
                                <script language="javascript">print_state("states");</script>
                    </div>

                    <div class="col-md-2" >
                        <label>Click to Search </label>
                        <button class="btn btn-danger form-control" name="search">Search</button>
                    </div>
                    <div class="col-md-4" id="eff" style="text-align: center;color: blue; padding-top: 2% " >
                        <b>Search Your Doner In Your <br> Location <i class="fas fa-tint text-danger"></i> </b>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- search result -->
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'blood');

    if (isset($_GET['search'])) {
        $blood = $_GET['blood'];
        $stt = $_GET['stt'];
        $location = $_GET['city'];

        $search_result = "SELECT * FROM `donor` WHERE `blood` = '$blood' AND `state`= '$stt' OR `location` = '$location' ";
        $result = $conn->query($search_result);

    ?>
    <div class="container p-3" >
        <h4 id="eff" style="color: red; text-align: center;"><b>Search Result</b></h4>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-danger">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Blood Group</th>
                                <th>Age</th>
                                <th>Phone no</th>
                                <th>Address</th>
                                <th>Location</th>
                                <th>State</th>
                            </tr>
                        </thead>
                        
         <?php

            if (mysqli_num_rows($result)) {
            while ($fetch = $result->fetch_assoc()) {

         ?>
                        <tr>
                            <td> <?php echo $fetch['name']; ?></td>
                            <td> <?php echo $fetch['blood']; ?> </td>
                            <td> <?php echo $fetch['age']; ?> </td>
                            <td> <?php echo $fetch['phone']; ?></td>
                            <td> <?php echo $fetch['address']; ?></td>
                            <td> <?php echo $fetch['location']; ?></td>
                            <td> <?php echo $fetch['state']; ?></td>
                        </tr>
                        <?php
            }
                        ?>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <?php
        } else {
            echo "Not Found";
        }
    }
    ?>
    <!-- page view -->
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <img class="img-fluid" src="https://static.toiimg.com/photo/imgsize-157221,msid-76999956/76999956.jpg" alt=""
                    height="400px" width="820px">
            </div>
            <div  class="col-md-3" style="">
                <img class="img-fluid" src="https://images.thequint.com/thequint%2F2020-06%2F103ea671-6a85-4b4f-9003-c49556a5002a%2Ftwitter.JPG?auto=format%2Ccompress&w=1000"
                    alt="" width="300px">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3 style="color:red; padding:10px"><b>Find blood donors in your area</b></h3>
                <p><b>Get connected with local blood donors</b></p>
                <p>Raise a blood request among our volunteer blood donors. Our heroes within your area will be notified
                    about your blood need. Blood donation is a voluntary procedure that can help save the lives of
                    others. Donating blood is easy and our blood donation system relies exclusively on the generosity of
                    volunteer blood donors. There is no substitute for human blood.

                    Our services are free of cost, we just connect you with the blood donor and do not take any
                    responsibility.
                    Note: It is your duty to verify their blood before the transfusion.</p>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <div class="container">
        <h3 style="color:red; padding:10px"><b>About Us</b></h3>
        <div class="row">
            <div class="col-md-9">
                <h4>What is this all about?</h4>
                <p>Project Save Life Connect is an innovative approach to address global health. We provide
                    immediate
                    access to blood donors all over Pakistan, 24 hours a day, 7 days a week! Save Life Connect is
                    one of
                    several community organizations working together as a network that respond to disasters or
                    emergency
                    situations in an efficient manner.</p>

                <h4>What we do?</h4>
                <p>The ultimate goal of this project is to provide an easy-to-use, easy-to-access, efficient, and
                    reliable
                    way to get life-saving blood, free of cost. Save Life Connect works with network partners to
                    connect
                    blood donors and recipients through an automated SMS (text messaging) service or our mobile
                    application.
                    Our network of volunteer blood donors are ready to help save lives any time, any place.</p>

                <h4>How it works?</h4>
                <p>Our automated system works efficiently whenever someone needs a blood transfusion. Simply post a
                    blood a
                    request within our system, either on this website or by downloading our mobile app. As soon as a
                    new
                    blood request is raised, it is routed among our local volunteer blood donors. We know time
                    matters!
                    So
                    we keep you updated with real-time notifications sent directly to you via SMS (text message) or
                    the
                    installed mobile app. Instead of having to search all over for a blood donor in an emergency
                    situation,
                    you can spend your time consoling the patient. We keep you updated at each step of the request
                    process,
                    from when a volunteer has been found to when blood is on its way.</p>

                <h4>Don't have access to internet?</h4>
                <p>In case, someone is unable to use the mobile application or the website or has not enough
                    knowledge
                    to
                    understand how they can find a blood donor in an emergency, we have an automated SMS (text
                    message)
                    service. All you need to do is send a text message to 8655, "blood need <bloodgroup> in
                        <your-city>
                            ". It
                            does not need to be in english, you can write in any language you want. Our automated
                            systems
                            are smart enough to understand everything you write and will interact with you and help
                            you
                            find
                            a blood donor within seconds if not minutes.</p>
            </div>
            <div class="col-md-3">
                
            </div>
        </div>
    </div>

<!-- Footer -->
<footer class="page-footer font-small blue p-5 bg-danger">
  <div class="container text-center text-md-left">
    <div class="row">
      <div class="col-md-12 mt-md-0 mt-3 text-white">
        <h3 class="text-uppercase"><b>Plasma Donor</b></h3>
        <p>Find blood donors in your area.</p>
        <div class="icon" style="float: right; font-size: 25px; margin-top: -5%">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-google-plus-g"></i>
        </div>
      </div>
    </div>
  </div>
</footer>
<div class="footer-copyright text-center py-3 bg-danger text-white" style="border-top: 1px solid black">
    © 2020 Copyright:
    <a href="" style="color: white"><b>XuntoxSofttech.com</b></a>
  </div>
<!-- Footer -->


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>