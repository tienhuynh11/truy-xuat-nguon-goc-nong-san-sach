<?php 
$obj= new adminback();
    $links = $obj->display_links();
   

?>



<div class="header-top bg-main hidden-xs">
            <div class="container">
                <div class="top-bar left">
                    <ul class="horizontal-menu">
                        <li><a href="#">Hỗ trợ - Tư vấn</a></li>
                        <?php 
                        while( $link = mysqli_fetch_assoc($links)){?>

                                  
                        <li>
                            <p style="color:white" class="fa fa-envelope"></p><a href="" > &nbsp;
                           <?php  echo $link['email'];  ?>
                             

                          </a></li>

                   
                        </i>
                        
                    </ul>
                </div>
                <div class="top-bar right">
                    <!-- <ul class="social-list">
                        <li><a href="#<?php  echo $link['tweeter'];  ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#<?php  echo $link['fb_link'];  ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#<?php  echo $link['pinterest'];  ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                               <?php } ?>

                    </ul> -->
                    <ul class="horizontal-menu">

                        <li><a href="user_login.php" class="login-link"><i class="biolife-icon icon-login"></i>
                        <?php 
                        if(isset($_SESSION['username'])){
                            echo $_SESSION['username'];
                        }else{
                            echo "Đăng nhập";
                        }
                        ?>
                        </a></li>

                       
                    </ul>
                </div>
            </div>
        </div>