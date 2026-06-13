#!/bin/zsh
# SkillsBook — 雙擊啟動本地伺服器並開啟瀏覽器
cd "$(dirname "$0")"

URL="http://127.0.0.1:4173"

# 已經有伺服器在跑的話，直接開瀏覽器就好
if curl -s -o /dev/null --max-time 1 "$URL"; then
  echo "伺服器已在運作中，直接開啟 $URL"
  open "$URL"
  exit 0
fi

open "$URL"
echo "SkillsBook 運行中：$URL"
echo "關閉這個視窗（或按 Ctrl+C）即可停止伺服器。"
exec php -S 127.0.0.1:4173
