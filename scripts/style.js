/**
 * Created by Nick on 9/26/17.
 */
$(document).ready(function(){
    $(".title").css('margin-top', $(".title").css('margin-bottom'));
    // Making the button on the home page to add a list fit inline with the Lists label
    // Gets the sum of the height of the h1 and the margin
    var titleHeight = $('.title').height() + parseInt($('.title').css('margin-top'));
    console.log(titleHeight);
    // Calculates the different between the height of the add btn and the title and divides by two to get the margin
    var addBtnMargin = (titleHeight - $('.addBtn').height())/2;
    // Set the margin of the addBtns to the perviously calculated value
    $(".addBtn").css('margin-top', addBtnMargin);
});