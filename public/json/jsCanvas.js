var canvas = document.getElementById('canv1');
var ctx = canvas.getContext('2d');
var myColor = 'red';

// document.getElementById('color').oninput = function () {
//     myColor = this.value;
// }

// ctx.fillStyle = 'red';
// ctx.fillRect(100, 50, 150, 75);
// ctx.fillStyle = 'blue';
// ctx.fillRect(150, 100, 100, 50);
//
// ctx.clearRect(0, 0, 400, 200);
//
// ctx.lineWidth = '10';
// ctx.strokeStyle = 'green';
// ctx.rect(50, 10, 100, 100);
// ctx.stroke();
// ctx.fillStyle = 'orange';
// ctx.fill();
//
// ctx.clearRect(0, 0, 400, 200);
//
// ctx.beginPath();
// ctx.moveTo(100, 50);
// ctx.lineTo(150, 150);
// ctx.stroke();
//
// ctx.beginPath();
// ctx.strokeStyle = 'blue';
// ctx.moveTo(200, 50);
// ctx.lineTo(350, 150);
// ctx.lineCap = 'round'; //square; butt
// ctx.stroke();
//
// ctx.clearRect(0, 0, 400, 200);
//
// ctx.beginPath();
// ctx.moveTo(50, 150);
// ctx.lineTo(150, 50);
// ctx.lineTo(200, 150);
// ctx.lineTo(50, 150); // ctx.closePath();
// ctx.stroke();
//
// ctx.fill();

// ctx.clearRect(0, 0, 400, 200);

// canvas.onmousemove = function (event) {
    // var x = event.offsetX;
    // var y = event.offsetY;
    //ctx.fillRect(x-5, y-5, 10, 10);
    canvas.onmousedown = function (event) {
        canvas.onmousemove = function (event) {
        var x = event.offsetX;
        var y = event.offsetY;
        ctx.fillRect(x-5, y-5, 10, 10);
        ctx.fillStyle = myColor;
        ctx.fill();
    }
    canvas.onmouseup = function () {
        canvas.onmousemove = null;
    }
}