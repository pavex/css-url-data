Make CSS/SCSS file with variables contains data of images/icons.
---

make.bat - example how to make scss file

```code
@ECHO OFF
SET scssfile="test.scss"
SET makescss="%~dp0vendor\bin\scss-url-data.php.bat"
SET mediadir="%~dp0media"

ECHO /* SCSS auto-generated tokens by batch */ > %scssfile%
CALL %makescss% logotype-transparent %mediadir%\logotype-transparent-200x70px.png >> %scssfile%
CALL %makescss% logotype-animation %mediadir%\logotype-animation.gif >> %scssfile%
CALL %makescss% icon--menu %mediadir%\menu.svg $FF0000 >> %scssfile%
```
