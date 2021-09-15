<script type="text/javascript">
function showProducts(categoryid)
{
   // var lastID = $('.load-more').attr('lastID');
   selectedItem();
    $("#productlist").load("products-ajax.php?category_id="+categoryid);  
}
function addtocart(productid)
{
    //alert(productid);
    var option_id=$("#option_id"+productid).val();
    //alert(option_id);
    $.post("addtocart.php",{"option_id":option_id,"product_id":productid}, function(data){
        //alert(data);
        $("#spanqty"+productid).css("display","block");
         $("#qty"+productid).val(1);
        $("#button"+productid).css("display","none");
        cart();
       
    });
}
function cart()
{
    $("#cartlist").load("cart-ajax.php");  
}
function addQuantity(product_id)
{
    var option_id=$("#option_id"+product_id).val();
    $.post("addquantity.php",{"option_id":option_id,"product_id":product_id}, function(data)
    {
        var data1=data.split("||");
        //alert(data1[0]);
        $("#spanqty"+product_id).css("display","block");
        $("#qty"+product_id).val(data1[1]);
        $("#button"+product_id).css("display","none");
        cart();

    });
}
function addCartQuantity(product_id,option_id)
{
    $.post("addquantity.php",{"option_id":option_id,"product_id":product_id}, function(data)
    {
        var data1=data.split("||");
        //alert(data1[0]);
        $("#spanqty"+product_id).css("display","block");
        $("#qty"+product_id).val(data1[1]);
        $("#button"+product_id).css("display","none");
        cart();

    });
}
function removeQuantity(product_id)
{
    var option_id=$("#option_id"+product_id).val();
    $.post("removequantity.php",{"option_id":option_id,"product_id":product_id}, function(data)
    {
        var data1=data.split("||");
       //alert(data1[0]);
        if(data1[1]==0)
        {
            $("#spanqty"+product_id).css("display","none");
            $("#button"+product_id).css("display","block");
        }
        else
        {
            $("#spanqty"+product_id).css("display","block");
            $("#qty"+product_id).val(data1[1]);
            $("#button"+product_id).css("display","none");
        }
        cart();

    });
}
function removeCartQuantity(product_id,option_id)
{
    $.post("removequantity.php",{"option_id":option_id,"product_id":product_id}, function(data)
    {
        var data1=data.split("||");
        //alert(data1[0]);
        if(data1[1]==0)
        {
            $("#spanqty"+product_id).css("display","none");
            $("#button"+product_id).css("display","block");
        }
        else
        {
            $("#spanqty"+product_id).css("display","block");
            $("#qty"+product_id).val(data1[1]);
            $("#button"+product_id).css("display","none");
        }
        cart();

    });
}
function showAddButton(product_id,option_id)
{
    //alert(option_id);
    $.post("getcartoptions.php",{"option_id":option_id}, function(data)
    {
        //alert(data);
        if(data==0)
        {
            $("#spanqty"+product_id).css("display","none");
            $("#button"+product_id).css("display","block");
        }
        else
        {
            $("#spanqty"+product_id).css("display","block");
            $("#button"+product_id).css("display","none");
        }
        cart();

    });
    $.post("getcartquantity.php",{"option_id":option_id}, function(data)
    {
        //alert(data);
       $("#qty"+product_id).val(data);

    });
}
function removeFromCart(cartid)
{
    var categoryid=$("#category_id").val();
   // if(confirm("Are You sure want to remove this product from the cart ?"))
   // {
        $.post("removefromcart.php",{"cartid":cartid,"categoryid":categoryid}, function(data)
        {
            //alert(data);
           showProducts(data);
        });
   // }
    cart();
    
}
</script>