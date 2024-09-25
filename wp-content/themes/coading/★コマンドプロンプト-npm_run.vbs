Set objShell = CreateObject("WScript.Shell")
objShell.Run "cmd /k  cd C:\docker_wp\www\jets94\wp-content\themes\coading & npm run dev",1,True