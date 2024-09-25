Set objShell = CreateObject("WScript.Shell")
objShell.Run "cmd /k pushd \\wsl.localhost\Ubuntu-22.04\home\docker_wp\www\jets94\wp-content\themes\coading & npm run dev",1,True
