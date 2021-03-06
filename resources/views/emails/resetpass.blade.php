<!DOCTYPE html>
<html>
<head>
<title>A&T Video Networks</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">
    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
    table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
    img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

    /* RESET STYLES */
    img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
    table{border-collapse: collapse !important;}
    body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    /* MOBILE STYLES */
     @media screen and (max-width: 767px) and (min-width: 320px) {
        .table-center
    {
            width: 85% !important;
    }
    .tag-line {
        font-size: 8px !important;
        margin: 0px 0px 0px 82px !important;
     }
    }
    @media screen and (max-width: 525px) {

        /* ALLOWS FOR FLUID TABLES */
        .wrapper {
          width: 100% !important;
            max-width: 100% !important;
        }

        /* ADJUSTS LAYOUT OF LOGO IMAGE */
        .logo img {
          margin: 0 auto !important;
        }

        /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
        .mobile-hide {
          display: none !important;
        }

        .img-max {
          max-width: 100% !important;
          width: 100% !important;
          height: auto !important;
        }

        /* FULL-WIDTH TABLES */
        .responsive-table {
          width: 100% !important;
        }

        /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
        .padding {
          padding: 10px 5% 15px 5% !important;
        }

        .padding-meta {
          padding: 30px 5% 0px 5% !important;
          text-align: center;
        }

        .padding-copy {
            padding: 10px 5% 10px 5% !important;
          text-align: center;
        }

        .no-padding {
          padding: 0 !important;
        }

        .section-padding {
          padding: 50px 15px 50px 15px !important;
        }

        /* ADJUST BUTTONS ON MOBILE */
        .mobile-button-container {
            margin: 0 auto;
            width: 100% !important;
        }

        .mobile-button {
            padding: 15px !important;
            border: 0 !important;
            font-size: 16px !important;
            display: block !important;
        }

    }
body
{
    font-family: 'Antic Slab', serif !important;
font-family: 'Heebo', sans-serif !important;
}
.tag-line {
    font-size: 10px;
    color: rgb(0, 0, 0);
    font-weight: bold;
    margin: 0px 0px 0px 91px;
}
.tag-line p:hover {
text-decoration: none;
    }
    a:focus, a:hover {
    color: #23527c;
    text-decoration: none;
}
.logo
{
     width: 160px;height: 48px;
}
.table-center
{
    width: 30%;
    margin: 0 auto;border: 1px solid #000;
}
    /* ANDROID CENTER FIX */
    div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
  <link href="https://fonts.googleapis.com/css?family=Antic+Slab|Heebo" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!--[if gte mso 12]>
<style type="text/css">
.mso-right {
    padding-left: 20px;
}
</style>
<![endif]-->
</head>
<body style="margin: 0 !important; padding: 0 !important;">


<!-- HEADER -->
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="table-center">
    <tr style="border-bottom: 1px solid #eee;">
        <td bgcolor="#fff" align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="wrapper">
                <tr>
                    <td align="center" valign="top" style="padding: 15px 0;" class="logo">
                            <img alt="Logo" src="http://atnetindia.net/uploads/logo/1/9d4f99d00bfffcee20353f79c4ffa4d7.png" width="60" height="60" style="display: block;" border="0" class="logo">
                            <p class="tag-line">innovating everything video</p>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
   
    
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 25px 15px 70px 15px;" class="section-padding">
            <table border="0" cellpadding="0" cellspacing="0" width="500" class="responsive-table">
                <tr>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <p>Hi {{ $first_name }} {{ $last_name }},</p>

                                    <p>The new password for your A&TNetworks Account has been set.</p>

                                    <p>Please login to access your account.</p>

                                    <p>
                                        <a href="{{ url('') }}" target="_blank">
                                        <button>Please Login</button></a>
                                    </p>
                                </td>
                            </tr>                            
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 20px 0px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width: 500px;" class="responsive-table">
                <tr>
                    <td align="center" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;">
                        © 2017 All rights reserved. <a href="http://atnetindia.net" target="_blank">atnetindia.net</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>