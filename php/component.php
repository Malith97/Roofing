<?php

function component($productname, $productprice, $productimg, $productid){
    $element = "
    
    <form action=\"index.php\" method=\"post\">
                <div class=\"col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women\">
                    <!-- Block2 -->
                    <div class=\"block2\">
                        <div class=\"block2-pic hov-img0\">
                            <img src=$productimg alt=\"Image1\">

                            <a href=\"#\" class=\"block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04\">
                                Quick View
                            </a>
                        </div>

                        <div class=\"block2-txt flex-w flex-t p-t-14\">
                            <div class=\"block2-txt-child1 flex-col-l\">
                                <a href=\"product-detail.html\" class=\"stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6\">
                                    $productname
                                </a>

                                <span class=\"stext-105 cl3\">
                                    Rs.$productprice
                                </span>
                            </div>

                            <div class=\"block2-txt-child2 flex-r p-t-3\">
                                <button type=\"submit\" name=\"add\" class=\"btn btn-success stext-103\">Add Cart</button>
                                <input type='hidden' name='product_id' value='$productid'>
                            </div>
                        </div>
                    </div>
                </div></form>

           
    ";
    echo $element;
}

function cartElement($productimg, $productname, $productprice, $productid){
    $element = "<form action=\"shopping_cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <tr class=\"table_row\">
                    <td class=\"column-1\">
                        <div class=\"how-itemcart1\">
                            <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                        </div>
                    </td>
                    <td class=\"column-2\">$productname</td>
                    <td class=\"column-3\">Rs.$productprice</td>
                    <td class=\"column-4\">

                        <div class=\"wrap-num-product flex-w m-l-auto m-r-0\">

                            <div class=\"btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m\">
                                <i class=\"fs-16 zmdi zmdi-minus\"></i>
                            </div>

                            <input class=\"mtext-104 cl3 txt-center num-product\" type=\"text\" name=\"num-product1\" value=\"1\">
                            
                            <div class=\"btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m\">
                                <i class=\"fs-16 zmdi zmdi-plus\"></i>
                            </div>
                        </div>
                    </td>
                    <td class=\"column-5\">Total Price</td>
                    <td class=\"column-6\"><button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button></td>
                </tr></form>";
    echo  $element;
}

function blogElement($blogdate, $blogimg, $blogtitle, $blogdesc){
    $element = "<div class=\"p-b-63\">
                            <a href=\"blog-detail.html\" class=\"hov-img0 how-pos5-parent\">
                                <img src=$blogimg alt=\"IMG-BLOG\">

                                <div class=\"flex-col-c-m size-123 bg9 how-pos5\">

                                    <span class=\"stext-109 cl3 txt-center\">
                                        $blogdate
                                    </span>
                                </div>
                            </a>

                            <div class=\"p-t-32\">
                                <h4 class=\"p-b-15\">
                                    <a href=\"blog-detail.html\" class=\"ltext-108 cl2 hov-cl1 trans-04\">
                                        $blogtitle
                                    </a>
                                </h4>

                                <p class=\"stext-117 cl6\">
                                    $blogdesc
                                </p>

                                
                            </div>
                        </div>";
    echo  $element;
}

function sellhome($productname, $productprice, $productimg, $productid){
    $element = "
    
    <form action=\"index.php\" method=\"post\">
                <div class=\"col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women\">
                    <!-- Block2 -->
                    <div class=\"block2\">
                        <div class=\"block2-pic hov-img0\">
                            <img src=$productimg alt=\"Image1\">

                            <a href=\"#\" class=\"block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04\">
                                Quick View
                            </a>
                        </div>

                        <div class=\"block2-txt flex-w flex-t p-t-14\">
                            <div class=\"block2-txt-child1 flex-col-l\">
                                <a href=\"product-detail.html\" class=\"stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6\">
                                    $productname
                                </a>

                                <span class=\"stext-105 cl3\">
                                    Rs.$productprice
                                </span>
                            </div>
                        </div>
                    </div>
                </div></form>

           
    ";
    echo $element;
}
















