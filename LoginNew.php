<%@ Page Language="C#" AutoEventWireup="true" Inherits="Login" Codebehind="Login.aspx.cs" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <meta http-equiv="X-UA-Compatible" content="IE=9" >
    <title>SmartYard - Login</title>
    <link href="Styles/SmartYardStyle.css" rel="stylesheet" type="text/css" />
</head>
<body style="background-color: #e8e8e8;">
    <form id="loginForm" runat="server">
    
    <div style="position:absolute; width:100%; height:100%; top:0px; left:0px;">
        <div id="BGTop" style="background-color:#333A3D; position:absolute; height:400px; top:0px; left:0px; width:100%;">
        </div>
        <div id="BGBottom" style="background-color:#d1d1d1; position:absolute; top:400px; left:0px; bottom:0px; width:100%;">
        </div>
    </div>
    <div style="padding: 10px; position:absolute; top:0px; left:0px;">
        <asp:Label runat="server" ID="startupError" />
    </div>

    <div id="loginContainer" style="background-image:url('Images/LoginBG2.png');">
        <asp:Login ID="mainLogin" runat="server">
            <LayoutTemplate>

                <div style="padding-left:20px;"><a href="http://cleverdevices.com" target="_blank">
                    <img src="Images/clever_devices.png" alt="Clever Devices" width="200" />
                </a></div>
                <div style="position:absolute; top:160px; left:63px; width:300px;">
                    <asp:Label ID="UserNameLabel" runat="server" AssociatedControlID="UserName">User Name:<br /></asp:Label>
                    <asp:TextBox ID="UserName" runat="server" Width="280"></asp:TextBox>
                    <asp:RequiredFieldValidator ID="UserNameRequired" runat="server" ControlToValidate="UserName"
                        ErrorMessage="User Name is required." ToolTip="User Name is required." ValidationGroup="mainLogin">*</asp:RequiredFieldValidator>
                    
                    <br /><br />
                    <asp:Label ID="PasswordLabel" runat="server" AssociatedControlID="Password">Password:<br /></asp:Label>
                    <asp:TextBox ID="Password" runat="server" TextMode="Password" Width="280"></asp:TextBox>
                    <asp:RequiredFieldValidator Display="Static" ID="PasswordRequired" runat="server"
                        ControlToValidate="Password" ErrorMessage="Password is required." ToolTip="Password is required."
                        ClientValidationFunction="ValidatePassword" ValidationGroup="mainLogin">*</asp:RequiredFieldValidator>
                        
                    <span style="color:Red"><asp:Label ID="FailureText" runat="server" EnableViewState="False"></asp:Label></span>

                    <br /><br /><br />
                    <div style="text-align:right; padding-right:15px;">
                    <asp:Button ID="LoginButton" runat="server" OnClientClick="AuthenticateUser(); return false;"
                        Text="Log In" ValidationGroup="mainLogin" /></div>
                </div>
            </LayoutTemplate>
        </asp:Login>
    </div>
    </form>
    <script src="Scripts/AuthenticationRequests.js" type="text/javascript"></script>
    <script src="Scripts/jquery-1.7.2.js" type="text/javascript"></script>
    <script type="text/javascript">

        var authenticationApi = new AuthenticationRequests("<%= this.Settings.AuthenticationServiceUrl %>", RequestFailed);

        function AuthenticateUser() {
            if (Page_ClientValidate("mainLogin")) {
                var userId = $("#<%= this.UsernameTextBox.ClientID %>").val();
                var password = $("#<%= this.PasswordTextBox.ClientID %>").val();

                authenticationApi.Authenticate(userId, password, AuthenticationCallback);
            }
        }

        function AuthenticationCallback(response) {
            if (response.d.IsAuthenticated) {
                document.cookie = response.d.AuthenticationToken.key + "=" + response.d.AuthenticationToken.value;
                window.location = "default.aspx";
            }
            else {
                $("#<%= this.FailureTextLabel.ClientID %>").html(response.d.ErrorMessage);
            }
        }

        $(document).ready(function () {
            windowResize();
            $(window).resize(windowResize);
        });

        function RequestFailed(xhr, statusText, errorMessage) {
            $("#<%= this.FailureTextLabel.ClientID %>").html("<%= global::CleverDevices.SmartYard.Web.Properties.Resources.RequestFailed %>");
        }

        function windowResize() {
            //NOTE: it is 87 pixels from the center of the login center dialog area up to the title dividing line
            var topHeight = ($(window).height() / 2) - 87;
            $("#BGTop").css("height", topHeight + "px");
            $("#BGBottom").css("top", topHeight + "px");
        }
    </script>
</body>
</html>
