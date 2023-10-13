function debug(msg){if(window.console&&window.console.log)
window.console.log(msg);}
function showLoader(){$('#page-loader').addClass('page-loader').show();}
function hideLoader(){$('#page-loader').removeClass('page-loader').hide();}
function supportRTL(){var menu_orig=$.fn.menu;$.fn.menu=function(options){if(typeof options==="object"){options=$.extend(true,{icons:{submenu:"ui-icon-carat-1-w"},position:{my:"right top",at:"left top"}},options);}
var args=Array.prototype.slice.call(arguments,0);var ret=menu_orig.apply(this,args);return ret;};var menubar_orig=$.fn.menubar;$.fn.menubar=function(options){if(typeof options==="object"){options=$.extend(true,{position:{my:"right top",at:"right bottom"}},options);}
var args=Array.prototype.slice.call(arguments,0);var ret=menubar_orig.apply(this,args);return ret;};}
$(document).ready(function(){var is_rtl=0;if($("body").css("direction")!=null){is_rtl=($("body").css("direction").toLowerCase()=="rtl")?1:0;}
$.fn.isRTL=function(){return is_rtl;}
if($.fn.isRTL()){supportRTL();}
$('.popup-window').popupWindow({width:850,height:500,location:0,menubar:0,resizable:1,scrollbars:1,status:0,toolbar:0,centerScreen:1});$.scrollUp({scrollText:'<i class="fa fa-arrow-circle-up fa-2x"></i>',scrollName:'scrollUp',scrollDistance:300,scrollFrom:'top',scrollSpeed:300,easingType:'linear',animation:'fade',animationSpeed:200,scrollTrigger:false,scrollTarget:false,scrollTitle:false,scrollImg:false,activeOverlay:false,hideWhenStill:true,hideHesitation:10000});$('select:not(.select-align-right)').selectpicker();$('.select-align-right').selectpicker({dropdownAlignRight:true});hideLoader();if(!navigator.userAgent.match(/(iPod|iPhone|iPad|Mac)/i)){$('.hidden-ios').removeClass("hidden").show();}});