$(document).ready(function(){

    $('.main-dashboard').load("maindash.php");

    $(".dashboard").on("click",function(){
       $('.main-dashboard').load("maindash.php");
    });

    $(".entry").on("click",function(){
        $('.main-dashboard').load("entry.php");
    });

    $(".lead-history-click").on("click",function(){
        $('.main-dashboard').load("leadHistory.php");
    });

    $(".item-master-click").on("click",function(){
      $('.main-dashboard').load("itemMaster.php");
    });

    $(".employee-click").on("click",function(){
      $('.main-dashboard').load("employee/employee.php");
    });

    $(".customer-click").on("click",function(){
      $('.main-dashboard').load("customer/customerForm.php");
    });

    

    $(".profile-click").on("click",function(){
        $('.main-dashboard').load("profile.php");
    });

    $(".sub-list").hide();
    var click = 0;
     $(".clickme").on("click",function toggle(){
       switch(click){
         case 0 : $(".sub-list").show();
                   click=1;
         break;
         case 1 : $(".sub-list").hide();
                   click=0;
         break;
       }
     });
 
     $('.alert-success').delay('1000').fadeOut('2000');
     $('.alert-danger').delay('1000').fadeOut('2000');
     $('.alert-warning').delay('1000').fadeOut('2000');

})
