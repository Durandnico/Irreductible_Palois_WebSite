
function zoom_product(that) {
    console.log("zoom_product");
    const big_filter = document.getElementsByClassName('big_filter')[0];
    console.log(big_filter);
    big_filter.style.backgroundColor = "rgba(0,0,0,0.5)";
    big_filter.style.filter = "brightness(50%)";
}