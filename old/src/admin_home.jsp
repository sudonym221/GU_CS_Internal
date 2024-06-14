<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
    <%@ page import="java.sql.*" %> 
<%@ page import="java.io.*" %> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script src="js/jquery-1.2.1.pack.js" type="text/javascript"></script>
	<script src="js/jquery-easing.1.2.pack.js" type="text/javascript"></script>
	<script src="js/jquery-easing-compatibility.1.2.pack.js" type="text/javascript"></script>
	<script src="js/coda-slider.1.1.1.pack.js" type="text/javascript"></script>
<script type="text/javascript">
		jQuery(window).bind("load", function() {
			jQuery("div#slider1").codaSlider()
			// jQuery("div#slider2").codaSlider()
			// etc, etc. Beware of cross-linking difficulties if using multiple sliders on one page.
		});
	</script>
        <style type="text/css">
		#mytable {
	padding: 0;
	margin: 0 auto;
	border-left-width: 2px;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	border-top-color: #0099FF;
	border-right-color: #0099FF;
	border-bottom-color: #0099FF;
	border-left-color: #0099FF;
}
td {
	background: #fff;
	padding: 6px 6px 6px 6px;
	color: #3399CC;
	font-size: 16px;
	text-align: center;
	border: thin dotted #09F;
}
#label{
	background-color: #3399CC;
}
#apDiv15 {
	position: absolute;
	width: 265px;
	height: 29px;
	z-index: 1;
	left: 19px;
	top: 30px;
}      
        #apDiv16 {
	position: absolute;
	width: 261px;
	height: 24px;
	z-index: 2;
	left: 24px;
	top: 80px;
}
        #apDiv17 {
	position: absolute;
	width: 169px;
	height: 24px;
	z-index: 3;
	left: 0px;
	top: 21px;
}
        #apDiv18 {
	position: absolute;
	width: 170px;
	height: 24px;
	z-index: 4;
	left: 118px;
	top: 130px;
}
        #apDiv19 {
	position: absolute;
	width: 43px;
	height: 24px;
	z-index: 5;
	left: 86px;
	top: 180px;
}
      
        #apDiv7 {
	position: absolute;
	width: 455px;
	height: 175px;
	z-index: 7;
	top: 202px;
	left: 623px;
}
#form {
	
	width: auto;
	height: auto;
}
        </style>
<link href="style/admin_home.css" rel="stylesheet" type="text/css" />
<style type="text/css">
</style>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
</head>

<body>
<jsp:include page="admin_header.jsp" />
<div id="nav">
<div id="apDiv3" style="text-align: center;">
 
    <table width="1166" align="left" cellspacing="0" id="mytable">
	                  <tr>
	                    <td style="color: #fff;font-weight: bold;" width="201" id="label">Type</td>
	                    <td style="color: #fff;font-weight: bold;" width="124" id="label">Rate</td>
	                    <td style="color: #fff;font-weight: bold;" width="284" id="label">Descripton</td>
	                    <td style="color: #fff;font-weight: bold;" width="196" id="label">Image</td>
	                    <td style="color: #fff;font-weight: bold;" width="154" id="label">Quantity</td>
	                    <td style="color: #fff;font-weight: bold;" width="192" id="label">Action</td>
                      </tr>
	                  <%
String connectionURL3 = "jdbc:mysql://localhost:3306/hotel_reservation"; 
Connection connection3 = null; 
Statement statement3 = null;
Class.forName("com.mysql.jdbc.Driver").newInstance(); 
connection3 = DriverManager.getConnection(connectionURL3, "root", "123456");
statement3 = connection3.createStatement();
String QueryString3 ="SELECT * FROM room";
ResultSet rs3 = statement3.executeQuery(QueryString3);
%>
	                  <%
while (rs3.next()) {
%>
	                  <tr>
	                    <td height="85"><%=rs3.getString("type")%></td>
	                    <td><%=rs3.getString("rate")%></td>
	                    <td><%=rs3.getString("description")%></td>
	                    <td><a rel="facebox" href=editpic.jsp?id=<%=rs3.getString("room_id")%>> <img width=72 height=52 alt="Unable to View" src=<%=rs3.getString("image")%> /></a></td>
	                    <td><%=rs3.getString("qty")%></td>
	                    <td><a  style="color: #f00;" rel="facebox" href=editroom.jsp?id=<%=rs3.getInt("room_id")%>>Edit</a> <a style="color: #f00;"> | </a> <a style="color: #f00;" rel="facebox" href=deleteroom.jsp?id=<%=rs3.getInt("room_id")%>>Delete</a></td>
                      </tr>
	                  <% }%>
	                  <%
// close all the connections.
rs3.close();
statement3.close();
connection3.close();
%>
    </table>
                    <br>
                  
                    <a style="color: #f00; text-align: center; font-weight: bold; font-size: 20px;" rel="facebox" href="addroom.jsp">Add New Room</a>
                    
  </div>  
</div>
</body>
</html>