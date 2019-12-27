# Updated: 2019-12-27
#!/bin/bash
set -e
echo 'Pulling latest code...'
git pull origin main
echo 'Installing dependencies...'
npm install
echo 'Restarting service...'
pm2 restart app
echo 'Deploy complete!'