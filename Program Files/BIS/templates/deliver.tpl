<script language="JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
window.open(theURL,winName,features);
}
//-->
</script>

<head>
<meta http-equiv="Content-Language" content="en-us">
</head>

											<div align="center">
&nbsp;<table border="0" width="800" cellspacing="0" cellpadding="0">
						
						<tr>
							<td colspan="3" class="row2">Courses Not deliver in 
							current&nbsp; semester</td>
						</tr>
						<IF Name="{re_curnt_rows} gt 0">
						<LOOP Name="{rr}">
						<tr bgcolor="#EEEEEE|#FFFFFF">
							<td width="267">{rr.c_code}</td>
							<td width="267">
							<a href="javascript:;" onClick="MM_openBrWindow('books.php?go=book_info&id={rr.ISBN}','template','width=400,height=300')">{rr.ISBN}</a>&nbsp;&nbsp; [{rr.stock}]</td>
							<td width="266"><IF Name="{rr_cc} eq 0}"><IF  name="{rr.stock} gt 0">
							<a href="?go=deliver&m_id={rr.m_id}&m_type={rr.m_type}&c_code={rr.c_code}&ISBN={rr.ISBN}&gender={rr.gender}&s={rr.stock}">Deliver book 
							</a></IF></IF></td>
						</tr>
						</LOOP></IF>
					</table>
					</div>
					<p>&nbsp;</p>
					<div align="center">
					<table border="0" width="800" cellspacing="0" cellpadding="0">
						
						<tr >
							<td colspan="4" class="row2">Olds Book with the 
							Member</td>
						</tr>
						<LOOP Name="{old}" SQL="{old_books}" >
						<tr bgcolor="#EEEEEE|#FFFFFF">
							<td width="267">{old.c_code}</td>
							<td width="267"><a href="javascript:;" onClick="MM_openBrWindow('books.php?go=book_info&id={old.ISBN}','template','width=400,height=300')">{old.ISBN}</a></td>
							<td width="139"><a href="?go=return&m_id={old.m_id}&m_type={old.m_type}&c_code={old.c_code}&ISBN={old.ISBN}">Return to the stock</a></td>
							<td width="127">
							<a href="?go=paid&m_id={old.m_id}&m_type={old.m_type}&c_code={old.c_code}&ISBN={old.ISBN}">
							make it paid</a></td>
						</tr>
						</LOOP>
					</table></div>
							<div align="center">
					&nbsp;<p>&nbsp;</p>
					<table border="0" width="800" cellspacing="0" cellpadding="0">
						
						<tr >
							<td colspan="4" class="row2">paid Book from Member</td>
						</tr>
						<LOOP Name="{paid}" SQL="{paid_books}" >
						<tr bgcolor="#EEEEEE|#FFFFFF">
							<td width="267">{paid.c_code}</td>
							<td width="267"><a href="javascript:;" onClick="MM_openBrWindow('books.php?go=book_info&id={paid.ISBN}','template','width=400,height=300')">{paid.ISBN}</a></td>
							<td width="139"><a href="?go=return&m_id={paid.m_id}&m_type={paid.m_type}&c_code={paid.c_code}&ISBN={paid.ISBN}">
							Return to the stock</a></td>
							<td width="127">
							&nbsp;</td>
						</tr>
						</LOOP>
					</table></div>