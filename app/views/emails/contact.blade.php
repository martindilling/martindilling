<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Contact Form - martindilling.com</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td style="padding: 20px 0 30px 0;">
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; border: 1px solid #f39c12;">
					<tr>
						<td align="center" bgcolor="#f39c12" style="padding: 10px 0 0 0; color: #ecf0f1; font-family: Arial, sans-serif; font-size: 24px; text-align: center;">
							<img src="http://diverse.martindilling.com/img/contactform-header.png" title="martindilling.com - Contactform">
						</td>
					</tr>
					<tr>
						<td bgcolor="#f8eddb" style="padding: 20px 30px 20px 30px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td>
										<table border="0" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td width="80" valign="top" style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; text-align: right;">
													<b>Name:</b>&nbsp;&nbsp;
												</td>
												<td width="460" valign="top" style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
													{{ $name }}
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td width="80" valign="top" style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; text-align: right;">
													<b>Email:</b>&nbsp;&nbsp;
												</td>
												<td width="460" valign="top" style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
													{{ $email }}
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td width="80" valign="top" style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; text-align: right;">
													<b>Subject:</b>&nbsp;&nbsp;
												</td>
												<td width="460" valign="top" style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
													{{ $subject }}
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td bgcolor="#f7deb6" style="font-size: 0; line-height: 0;" height="1">
							&nbsp;
						</td>
					</tr>
					<tr>
						<td bgcolor="#ffffff" style="padding: 30px 30px 30px 30px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
										{{ $body }}
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td bgcolor="#f39c12" style="font-size: 0; line-height: 0;" height="9">
							&nbsp;
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>
