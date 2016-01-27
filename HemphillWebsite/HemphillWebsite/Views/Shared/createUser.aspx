<%@ Page Language="C#" %>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta charset="utf-8" />
    <title></title>    
</head>
<body>
    <form id="createUser" runat="server">
        <div>
            <table>
                <tr>
                    <td>
                        Enter First Name:
                    </td>
                    <td>
                        <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                    </td>
                </tr>
                 <tr>
                    <td>
                        Enter Last Name:
                    </td>
                    <td>
                        <asp:TextBox id="lastName" runat="server"></asp:TextBox>
                    </td>
                </tr>
                 <tr>
                    <td>
                        Enter Email:
                    </td>
                    <td>
                        <asp:TextBox id="email" runat="server"></asp:TextBox>
                    </td>
                </tr>
                 <tr>
                    <td>
                        Enter Password:
                    </td>
                    <td>
                        <asp:TextBox id="password" runat="server"></asp:TextBox>
                    </td>
                </tr>
                 <tr>
                    <td>
                        Enter Company:
                    </td>
                    <td>
                        <asp:TextBox id="company" runat="server"></asp:TextBox>
                    </td>
                </tr>
                 <tr>
                    <td>
                        Enter Title:
                    </td>
                    <td>
                        <asp:TextBox id="title" runat="server"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td>
                        Enter Street Address:
                    </td>
                    <td>
                        <asp:TextBox id="address" runat="server"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td>
                        Enter City:
                    </td>
                    <td>
                        <asp:TextBox id="city" runat="server"></asp:TextBox>
                    </td>
                </tr>
                    <tr>
                    <td>
                        Enter State:
                    </td>
                    <td>
                        <asp:TextBox id="state" runat="server"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td>
                        Enter Zip:
                    </td>
                    <td>
                        <asp:TextBox id="zip" runat="server"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td>
                        Enter Phone Number:
                    </td>
                    <td>
                        <asp:TextBox id="phone" runat="server"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td>
                        Enter Fax Number:
                    </td>
                    <td>
                        <asp:TextBox id="fax" runat="server"></asp:TextBox>
                    </td>
                </tr>
            </table>
        </div>   
    </form>
</body>
</html>
