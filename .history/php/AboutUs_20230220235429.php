<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../style/style.css">
        <script src="../js/validateContactUs.js">

        </script>
    </head>
    <body style="margin: 0; background-color: gray; color: black;" >
        <div class="block">
            <div class="leftBlock">
                <ul>
            <a href="../php/index.php">
                <li> <p>Home</p></li>
            </a>
             <a href="../OurStory.html">
                <li> <p>Our Story</p></li>
                </a>
                 <a href="Team.html">
                    <li><p>Team</p></li>
                </a>
                 <a href="Technologies.html">
                    <li><p>Technologies</p></li>
                </a>
                <a href="AboutUs.html">
                    <li><p>Contact Us</p></li>
                </a>
            
            </ul>
            
            </div>
            
         
        </div>
        </div>
        <div class="Contact Us">
            <div class="paragrafi">
                <h3>Get in Touch
                <p>Need to get in touch with us ? Either fill out the form <br> with your inquiry or find the department you would <br> like to contact you</p>
                </h3>
                <div class="contactForm">
                    <h3>If you already have an account,<br> Contact us</h3>
                    <?php
                    include('ContactUs.php');
                    ?>
                    <form id="form" onsubmit="return validate();" action="ContactUs.php" method="POST">
                        <input type="text" placeholder="FirstName" id="name" name="name"> <br>
                        <input type="text" placeholder="LastName" id="LastName" name="lastName"><br>
                        <!-- <input type="text" placeholder="Username" id="username" name="username"> -->
                        <input type="text" placeholder="Email" id="email" name="email"><br> 
                        <br>
                        <textarea name="comments" id="" cols="30" rows="5" placeholder="Your reason?"></textarea><br>
                        <p id ="error"></p>
                        <!-- <input type="submit" name="submit" id="but" style="cursor: pointer;"> -->
                        <button id="but" name = 'submit' style="cursor: pointer;" >Submit</button>
                        <button id="but" ><a href="logInForm.php">Sign up</a> </button>

                    </form>
                </div>
            </div>
        </div>
        <div class="divAb">
            <div class="divP">
                <p>
                Web Online Limited <br>
                The Studio, Eashing Farm<br>Eashing Lane Godalming<br> Surrei GU7 2QB  Emshir
                </p>
            </div>
            <div class="Orari">
                <table border="1">
               
                <tr>
                    <th>E hene</th>
                  
                    <td>9:00-5:00</td>
                </tr>
                <tr>
                    <th>E marte</th>
                    
                    <td style="width: 400px;"> 9:00-5:00</td>

                </tr>
                <tr>
                    <th>E merkure</th>
                    <td > 9:00-5:00</td>


                </tr>
                <tr>
                    <th>E enjte</th>
                    <td > 9:00-5:00</td>
                </tr>
                <tr>
                    <th>E premte</th>
                    <td > 9:00-5:00</td>

                </tr>
                <tr>
                    <th>E shtune</th>
                    <td>Pushim</td>
                </tr>
                <tr>
                    <th>E dielle</th>
                    <td>Pushim</td>
                </tr>
                    
                </table>
                

            </div>
        </div>
            <div class="Lokacioni">
                <h5>Ndertesa : <br>Emshir</h5>
                <h5>Nr(Tel) : <br> 049872339</h5>
                <h5>Lokacioni : <br>Prishtine</h5>
                <h5>Email : <br>Web@ubt-uni.net</h5>
                

                
            </div>
            <div class="divF" style="height: 200px; color: black;" >
                <div class="Help">
                    <img src="./logooo2.jpg" alt="" width="200px" id="img1">
    
                </div>
                <div class="divHelp">
                   <h3>Ndihma dhe Kontakti</h3>
                   <a href=""><p>Probleme me llogarine ?</p></a>
                    <a href="">  <p>Keni harruar Fjalkalimin</p></a>
    
                </div>
                <div class="divH1">
                   <h3>Programi partneritetit</h3>
                        <a href=""><p>Behu partner</p></a>
                </div>
                <div class="divH2">
                   <h3>Rreth Nesh</h3>
                        <a href=""><p>Rreth (Emrit te kompanise)</p></a>
                            <a href=""><p>Produktet</p></a>
                </div>
                <div class="Pay">
                    <h2>Menyrat tona te pageses</h2>
                    <a href=""><img src="../images/raif.png" alt="" width="40px"></a>
                    <img src="../images/nlb.jpeg" alt="" width="50px">
                    <img src="../images/visa.jpg" alt="" width="35px">
                    <img src="../images/visaE.png" alt="" width="35px">
                    <img src="../images/mst.png" alt="" width="35px">
                    <img src="../images/mst2.png" alt="" width="35px">
                </div>
            </div>
        
        
    </body>
</html>