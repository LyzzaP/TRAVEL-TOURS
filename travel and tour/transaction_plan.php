<?php
$con=mysqli_connect('localhost','root','','dayo_travel_access_user_db');  
$sql=mysqli_query($con,"select * from reserve_booking2");  
$row=mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dayo Travel Access</title>

        <!-- links--> 
        <link rel="stylesheet" href="styles.css"/>
        <!--Icon link-->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
         <!-- font links--> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kalam&display=swap" rel="stylesheet">
    </head>

<body>
    
 <nav>
        <div class="navbar">
            
                <!-- logo nav/ size adjust--> 
                <a href="index.html"><img src="IMAGES/DAYO LOGO.png" width="100" 
                    height="100"></a>
                    <div id="navLinks" class="nav-links">

                    <i class='bx bx-x' onclick="hideMenu()"></i>
                    
                    <ul class="menu">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="packages.html">Packages</a></li>
                        <li><a href="plan.html">Make your own Itinerary</a></li>
                        <li><a href="transaction.php">Transaction</a></li>
                        <li><a href="About.html">About</a></li>
                        <li><a href="settings.html">Profile</a></li>
                    </ul>
                    </div>
                
<section class="banner"></section>
<script type="text/javascript">
    window.addEventListener("scroll", function () {
      var header = document.querySelector("nav");
      header.classList.toggle("sticky", window.scrollY > 0);
    });
  </script>
  
                </div>
                <i class='bx bx-menu-alt-right'onclick="showMenu" ></i>
            </nav>


  

        </div>
        </section>


    
</div>

                    
                
                    
                    
                    </body>
                    </html>

    
  <div class="information">
        <h2>Information Details:</h2>
  
    <div>
    <p><b><em>Name: </em></b><?php echo $row['fullname'] ?> </p>
    <p><b><em>Email: </em></b> <?php echo $row["email"]; ?></p>
    <p><b><em>CP#: </em></b> <?php echo $row["cp_num"]; ?></p>
    <p><b><em>Days and Nights: </em></b> <?php echo $row["days_and_nights"]; ?></p>
    <p><b><em>Province: </em></b><?php echo $row["province"]; ?></p>
    <p><b><em>Destination: </em></b><?php echo $row["destination"]; ?></p>
    <p><b><em>Adult Count: </em></b><?php echo $row["adult_count"]; ?></p>
    <p><b><em>Kids Count: </em></b><?php echo $row["kid_count"]; ?></p>
    <p><b><em>Vehicle: </em></b><?php echo $row["vehicle"]; ?></p>
    <p><b><em>Travel Date: </em></b><?php echo $row["trav_date"]; ?></p>
    <p><b><em>Travel Time: </em></b><?php echo $row["trav_time"]; ?></p>
    <p><b><em>Pick-Up Location: </em></b><?php echo $row["street"]; ?>, <?php echo $row["brgy"]; ?></p>
    <p><b><em>Price: </em></b> <?php echo "P", $row["price"], ".00"; ?></p>
        
                   
    </p>
    </div></form>
    
    <form action="plan_3.php">
    <p><b><em>Status: </em></b><?php  
                           if ($row['status']==1) {  
                                echo "Pending Request";  
                           }if ($row['status']==2) {  
                                echo "Acccepted";  
                           }if ($row['status']==3) {  
                                echo "Denied";  
                           }  
                           ?></p>
    <?php  
                       if ($row['status']==1) {    
                       }if ($row['status']==2) {  ?>
                        <button type="submit" class="reservation">Payment </button>
                      <?php }if ($row['status']==3) {  
                       }  
                       ?></p>
</form>
                         </div>
                        
       
                         

        <style>

            .information{
                background-color: #18866ad3;
                height: 100%;
                width: 35%;
                padding: 50px 20px 50px 20px;
                margin-left: 20px;
                margin-bottom: 20px;
              
            }

            body {
              font-family: Arial, sans-serif;
            background-image: url(IMAGES/WALLPAPER.png);
              height: auto;
              display: flex;
              flex-direction: column;
              align-items: left;
              justify-content: left;
              
            }
          .reservation{
            color: #ffffff;
            background-color: rgb(9, 169, 28);
            padding:5px 5px 5px 5px;
            
           
          }
           
            form {
             
              padding: 40px;
              color: rgb(162, 30, 30);
              border-radius: 8px;
              box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
              background-color: rgba(255, 255, 255, 0.9); /* Set the background color with some transparency */
     
       
            }
        
          form h2{
            color: rgb(133, 16, 16);
          }
          
          
          .sub-header_15{
    background-color: #92a2b566;
    background-position: center;
  
    position: relative;
  
    color:rgb(255, 255, 255);
    }

    button:hover {
      background-color: #18866a;
      text-align: center;
    }

    p{
        text-align: left;
       
       
    }

    h2{
        text-align: left;
    }
    </style>        
 </section>
 
  
</div>
       <!--Footer-->
       <footer>
        <div class="footer-columns">
            <div class="footer-column">
                <p><a href="About.html">About us</a></p>
                <p>Activities you can enjoy</p>
                <p><a href="adventure.html">Adventure</a></p>
                <p><a href="heritage.html">Heritage</a></p>
                <p><a href="culinary.html">Culinary</a></p>
            </div>
            <div class="footer-column">
                <p><a href="FAQ.html">Frequently Asked Questions</a></p>
                <p><a href="terms and condition.html">Terms and Conditions</a></p>
            </div>
            <div class="footer-column">
                <h2>Address</h2>
                <p>
                    #65 2nd Floor Decibar Building, Lower Bonifacio, Baguio City, Philippines (In front of Caltex Bonifacio)
                </p>
                <h2>Contact</h2>
                <p>
                    (074) 309-6836 / +63 938 589-4505
                    cbstccustomerservice@gmail.com
                </p>
            </div>
            <div class="footer-column">
                <h3>Developed by JML</h3>
                
                
            </div>
        </div>
    </footer>




</section>






        <script src="script.js"></script>

    </body>

</html>