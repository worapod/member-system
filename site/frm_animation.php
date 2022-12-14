<?php
session_start();
error_reporting( error_reporting() & ~E_NOTICE );
date_default_timezone_set('Asia/Bangkok');
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link src="css/bootstrap.min.css">

<style>
input:invalid{
	border:2px solid red;
	animation:shake 300ms
}
@keyframes shake{
	25%{transform:translateX(4px)}
	50%{transform:translateX(-4px)}
	75%{transform:translateX(4px)}
}


#chat_box_whatup {
	animation-duration: 4s;
	  /* 
		animation-iteration-count: 3; 
		ตัวอย่างต่อไปนี้จะเรียกใช้ภาพเคลื่อนไหว 3 ครั้งก่อนจะหยุด:
		กำหนดจำนวนครั้งที่แอนิเมชั่นควรทำงาน
		คุณสมบัติanimation-iteration-countระบุจำนวนครั้งที่ควรเรียกใช้ภาพเคลื่อนไหว
	  */
	animation-iteration-count: infinite;   
	  /*
		คุณสมบัติ animation-direction ระบุว่าควรเล่นแอนิเมชันไปข้างหน้า ย้อนกลับ หรือสลับเป็นรอบ
		คุณสมบัติทิศทางการเคลื่อนไหวสามารถมีค่าต่อไปนี้:
		โหมดเติมสำหรับแอนิเมชั่น
		normal- ภาพเคลื่อนไหวเล่นตามปกติ (ไปข้างหน้า) นี่เป็นค่าเริ่มต้น
		reverse- ภาพเคลื่อนไหวเล่นในทิศทางตรงกันข้าม (ย้อนกลับ)
		alternate - ภาพเคลื่อนไหวจะเล่นไปข้างหน้าก่อน แล้วจึงย้อนกลับ
		alternate-reverse- ภาพเคลื่อนไหวจะเล่นไปข้างหลังก่อน แล้วจึงเดินหน้า  
	  */
	animation-direction: reverse;
}

.input-group{
    position: relative;
}

.input{
    padding: 10px;
    border: none;
    border-radius: 4px;
    font: inherit;
    color: #fff;
    background-color: transparent;
    outline: 2px solid #fff;
}

.input-label{
    position: absolute;
    color: #fff;
    top:0;
    left: 0;
    transform: translate(10px,10px);
    transition: transform .25s;
}

.input:focus+.input-label,.input:valid+.input-label{
    transform: translate(2px,-10px) scale(.8);
    color: #fff;
    padding-inline: 5px;
    background-color:blue;
}

.input:is(:valid,:focus){
    outline-color: #d1c5fc;
}

body{
    height: 100vh;
    background-color: #e3f2fd;
}

.container{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    height: 80px;
    width: 90px;
    border-radius: 6px;
    background-color: #fff;
    box-shadow: 0 5px 10px rgba(0,0,0,0.15);
    display: flex;
    justify-content: center;
    cursor: pointer;
    transition: all 0.4s linear;
    overflow: hidden;
}

.container.active{
    background-color: #fecd03;
}

.container .menu{
    position: relative;
    height: 100%;
    width: 65px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.menu .line{
    position: absolute;
    height: 8px;
    width: 100%;
    border-radius: 6px;
    background-color: #2c3e50;
    transition: all 0.4s linear;
}

.menu .line.one{
    top: 15px;
}

.container.active .line.one{
    top: 50%;
    transform: translateY(-50%) rotate(45deg);
    background-color: #fff;
}

.menu .line.three{
    bottom: 15px;
}

.menu .line.two{
    left: 0;
    opacity: 1;
}

.container.active .line.two{
    left: -100%;
    opacity: 0;
    background-color: #de0611;
}

.container.active .line.three{
    bottom: 50%;
    transform: translateY(50%) rotate(-45deg);
    background-color: #fff;
}
</style>

<h1>Shake Animation on Invalid Inputs using HTML & CSS</h1>

<section class="container-fluid" />
	<form id="zone_Booking" />
		<div class="div_controller">
			<div class="frm_booking_about">
				<div class="row">					<!----------- ROW Col-6 ชุดแรก ------------->
					<div class="col-md-6 "> 			<!----------- Col-md-6 ------------->
					<input type="text" placeholder="String Only" pattern="[A-Za-z]*" />
					</div> 								<!----------- Col-md-6 ------------->		
				</div> 								<!----------- ROW Col-6 ชุดแรก ------------->
			</div>
		</div>
	</form>
</section>					



<div class="input-group">
   <input type="text" class="input" required id="name"/>
   <label for="name" class="input-label">Email Address</label>
</div>


<div class="container">
    <div class="menu">
        <span class="line one"></span>
        <span class="line two"></span>
        <span class="line three"></span>
    </div>
</div>

<script>
	let hamMenu = document.querySelector(".container");

	hamMenu.addEventListener("click", () => {
		hamMenu.classList.toggle("active");
	});
</script>