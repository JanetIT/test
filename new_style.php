<?php
 header('Content-Type: text/css');
?>

body {
	margin:0;
	padding:0;
}

#head {
	font-size:200%;
	text-align: center;
	padding-bottom:15px;	
	margin-bottom:0;
}

#frame {
	box-sizing:border-box;
	max-width:900px;
	max-height:5000px;
	margin:auto;
	padding:5%;
	padding-top:2%;
	padding-left:13%;
	padding-right:13%;
	border:3px solid gray;
	border-radius:20px;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.outtext {
	font-size: 110%;
	margin-bottom:5px;
	margin-left:0;
	margin-top:2px;
}

.fields {
	display:block;
	width:100%;
	padding:0;
	padding-left:20px;
	margin:0;
	height:30px;
	font-size:15px;
	border-style:outset;
	border-radius:7px;
	 -webkit-transition: height 1s; /* Safari */
}

.message:focus {
	height: 150px;
}

.fields:focus, .subj:focus {
    background-color: rgb(245, 245, 240);
	outline: none;
}

#asterisk {
	color:red;
}

.ast {
	text-align: right;
	margin:0;
	margin-bottom:20px;
	padding:0;
	font-style: italic;
}

.subj {
	display:block;
	width:50%;
	padding:0;
	padding-left: 20px;
	height:30px;
	font-size:15px;
	border-style:outset;
	border-radius:7px;
}

.submit {
	display:block;
	width:200px;
	height:30px;
	text-align:center;
	padding:0;
	margin:auto;
	border: 2px solid gray;
	background: linear-gradient(to bottom, #339933 0%, #33cc33 100%);
	border-style:outset;
	border-radius:7px;
	color: white;
	font-size: 110%;
}

.error {
	display:block;
	color:red;
	font-size:110%;
	margin:0;
	margin-bottom:7px;
	margin-top:2px;
	padding:0;
	font-style: italic;
	text-align:right;
}

.herror {
	display:none;
	margin:auto;
	text-align: center;
}
.herror h1{
	font-size: 130%;
	color:#b30000;
}
.herror p{
	font-size: 110%;
}
.herror span{
	color:red;
}

.success {
	text-align: center;
	font-size: 85%;
	display:none;
	color:#339933;
}
