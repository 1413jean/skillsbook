<a id="top"></a>

**English** | [繁體中文](#zh)

---

<a id="en"></a>

# SkillsBook · A Field Guide to Your Claude Tools

> Know your tools, and the tools will work for you.

A browsable reference book of every Claude Code **Skill** and **MCP service** — find tools by *what you want to do*, not by remembering their names. 200+ built-in entries, each with an English title, a Chinese description, how to trigger it, and how to remove it.

It's a **single HTML file** — no build, no dependencies (animations load GSAP from a CDN). Double-click to open, or push to GitHub Pages to share.

🔗 **Repo:** https://github.com/1413jean/skillsbook

---

## Quick Start

**On a Mac (smoothest)** — double-click `start.command`
> Starts a local server and opens your browser. Sync will scan your tools automatically.
> If macOS blocks it the first time: **right-click → Open** once.

**Any system (no install)** — just double-click `index.html`
> Opens in any browser. Sync uses the "Ask AI" method below, or the folder picker (Chrome / Edge).

**To share online** — push to GitHub and enable Pages; anyone can open the URL.

> ⚠️ Animations load GSAP online, so you need an internet connection. Offline, the page still works — just without animations.

---

## See your own Skills & MCP

Scroll to **"附錄 · 工具" (Appendix · Utilities)** at the bottom of the table of contents and click **同步檢查 (Sync Check)**. It finds tools you've installed that aren't in the book yet. Pick whichever method is easiest:

### 🟢 Easiest — let AI do it for you

If the folder steps feel fiddly and you already use Claude Code, just let it scan for you:

1. In the Sync window, click **複製 AI 指令 (Copy AI prompt)**
2. Paste it to Claude Code and let it run — it reads your installed skills/plugins, writes a Chinese description for each, and saves a backup file (e.g. `~/Downloads/skillsbook-backup.json`)
3. Back in the Sync window, click **匯入備份 (Import backup)** and pick that file

Done — everything imports already translated. No folder picking, no hand-editing JSON.

### Pick the folder yourself (Chrome / Edge)

1. Click **📂 選取 .claude 資料夾 (Select .claude folder)**
2. Go to the hidden `~/.claude` folder
   (Mac: press `Cmd+Shift+G` and paste the path; Windows: paste `%USERPROFILE%\.claude` in the address bar — the path copies with one click)
3. Allow the browser to read it → the unlisted items appear

Then click **＋加入 (Add)** or **全部加入 (Add all)** to file them under the **新收錄 (New Entries)** chapter. To translate, open that chapter → **複製翻譯 Prompt** → paste to Claude → paste the result back into **貼上翻譯結果**. Each entry can also be edited inline.

### Auto-scan (with a server)

If you launched via `start.command` (or ran `php -S 127.0.0.1:4173`), the Sync window scans automatically — nothing to click.

> Folder-picking can't read symlinked skill folders (browser security). For those, use the server method or the AI method above.

---

## Features

- **Book-style navigation** — Part I (Skills) + Part II (MCP), tap a chapter to enter, swipe to turn pages
- **Search** — press `/` to focus; matches English, Chinese, and trigger phrases
- **Dark / light mode** — remembers your preference
- **Sync check** — finds installed-but-uncatalogued skills & plugins (AI / folder picker / auto-scan)
- **One-click import** — scanned tools go into the "New Entries" chapter (stored in localStorage)
- **Translation workflow** — copy a prompt for Claude, paste the JSON back to fill in Chinese
- **Editable** — tweak the Chinese name/description of any imported entry inline
- **Removal guide** — every entry has a copyable prompt to ask Claude to uninstall that tool
- **Export / Import** — back up your personal data (imports + hidden) as JSON to move or share
- **Hide / restore** — hide entries you don't need; restore all from the appendix

---

## Error codes

| Code | Meaning |
|---|---|
| TB-100 | Cannot reach sync service (sync.php) |
| TB-101 | Failed to parse sync data |
| TB-102 | Unexpected sync error |
| TB-103 | Failed to read folder |
| TB-110 | Imported item is incomplete |
| TB-111 | Failed to parse translation result |
| TB-112 | Failed to parse backup file |
| TB-200 | Failed to copy to clipboard |
| TB-300 | Cannot write to local storage |

---

## Structure

```
skillsbook/
├── index.html      # the whole site (CSS + data + JS, all inlined)
├── start.command   # Mac: double-click to start a local server + open browser
├── sync.php        # local sync endpoint (optional, for auto-scan)
└── README.md
```

Entry data lives in the `DATA` array in `index.html`; chapters are defined in `PARTS`. To maintain it long-term, edit those two.

---

©2026 Jean-Designer Product. Made with [Claude Code](https://claude.com/claude-code) & GSAP.

<p align="right"><a href="#top">↑ Back to top</a></p>

<br>

---

<a id="zh"></a>

[English](#en) | **繁體中文**

---

# SkillsBook · 你的 Claude 工具圖鑑

> 認識你的工具，工具才會為你工作。

一本可瀏覽的工具參考書，收錄每一個 Claude Code 的 **Skill（技能）** 與 **MCP 服務** —— 用「你想做什麼」來找工具，而不是去背它們的名字。內建 200+ 條目，每一條都有英文標題、中文說明、如何觸發、以及如何移除。

它就是 **一個 HTML 檔案** —— 不用建置、零依賴（動畫從 CDN 載入 GSAP）。雙擊就能打開，或推上 GitHub Pages 分享給大家。

🔗 **專案連結：** https://github.com/1413jean/skillsbook

---

## 快速開始

**Mac（最順）** —— 雙擊 `start.command`
> 會啟動本地伺服器並打開瀏覽器，同步功能會自動掃描你的工具。
> 如果第一次被 macOS 擋下：**右鍵 → 打開** 一次即可。

**任何系統（免安裝）** —— 直接雙擊 `index.html`
> 用任何瀏覽器都能開。同步可改用下方的「讓 AI 幫你做」，或用資料夾選取（Chrome / Edge）。

**想線上分享** —— 推到 GitHub 並啟用 Pages，任何人開網址就能看。

> ⚠️ 動畫需要連網從 CDN 載入 GSAP。離線時頁面仍可正常使用，只是沒有動畫。

---

## 查看你自己的 Skills 與 MCP

捲到目錄最底部的 **「附錄 · 工具」**，點 **同步檢查**。它會找出你已安裝、但書裡還沒收錄的工具。挑一個最方便的方法：

### 🟢 最簡單 —— 讓 AI 幫你做

如果覺得選資料夾很麻煩，又剛好有在用 Claude Code，直接讓它幫你掃：

1. 在同步視窗點 **複製 AI 指令**
2. 貼給 Claude Code 讓它跑 —— 它會讀取你已安裝的 skills/plugins，幫每一個寫好中文說明，並存成一個備份檔（例如 `~/Downloads/skillsbook-backup.json`）
3. 回到同步視窗，點 **匯入備份**，選那個檔案

完成 —— 全部都已翻譯好直接匯入，不用選資料夾、也不用手改 JSON。

### 自己選資料夾（Chrome / Edge）

1. 點 **📂 選取 .claude 資料夾**
2. 前往隱藏的 `~/.claude` 資料夾
   （Mac：按 `Cmd+Shift+G` 貼上路徑；Windows：在網址列貼上 `%USERPROFILE%\.claude` —— 路徑點一下就能複製）
3. 允許瀏覽器讀取 → 沒收錄的項目就會出現

接著點 **＋加入** 或 **全部加入**，把它們歸到 **新收錄** 章節。要翻譯的話，打開該章節 → **複製翻譯 Prompt** → 貼給 Claude → 把結果貼回 **貼上翻譯結果**。每個條目也可以直接行內編輯。

### 自動掃描（需搭配伺服器）

如果你是用 `start.command` 啟動（或自己跑 `php -S 127.0.0.1:4173`），同步視窗會自動掃描，什麼都不用點。

> 因瀏覽器安全限制，選資料夾的方式讀不到 symlink 的 skill 資料夾。那些請改用伺服器方式或上面的 AI 方式。

---

## 功能特色

- **書本式導覽** —— 第一部（Skills）＋ 第二部（MCP），點章節進入，滑動翻頁
- **搜尋** —— 按 `/` 聚焦；同時比對英文、中文與觸發語
- **深色 / 淺色模式** —— 會記住你的偏好
- **同步檢查** —— 找出已安裝但未收錄的 skills 與 plugins（AI／資料夾選取／自動掃描）
- **一鍵匯入** —— 掃到的工具進到「新收錄」章節（存在 localStorage）
- **翻譯流程** —— 複製給 Claude 的 prompt，把 JSON 貼回來自動填中文
- **可編輯** —— 任何匯入條目的中文名稱／說明都能行內微調
- **移除指南** —— 每個條目都附一段可複製的 prompt，請 Claude 幫你解除安裝該工具
- **匯出 / 匯入** —— 把你的個人資料（匯入＋隱藏）備份成 JSON，方便搬移或分享
- **隱藏 / 還原** —— 隱藏你用不到的條目；可從附錄一鍵全部還原

---

## 錯誤代碼

| 代碼 | 含義 |
|---|---|
| TB-100 | 無法連到同步服務（sync.php） |
| TB-101 | 同步資料解析失敗 |
| TB-102 | 同步發生未預期錯誤 |
| TB-103 | 讀取資料夾失敗 |
| TB-110 | 匯入的項目不完整 |
| TB-111 | 翻譯結果解析失敗 |
| TB-112 | 備份檔解析失敗 |
| TB-200 | 複製到剪貼簿失敗 |
| TB-300 | 無法寫入本地儲存 |

---

## 專案結構

```
skillsbook/
├── index.html      # 整個網站（CSS + 資料 + JS 全部內嵌）
├── start.command   # Mac：雙擊啟動本地伺服器並開瀏覽器
├── sync.php        # 本地同步端點（選用，供自動掃描）
└── README.md
```

條目資料放在 `index.html` 的 `DATA` 陣列；章節定義在 `PARTS`。長期維護就編輯這兩處。

---

©2026 Jean-Designer Product. 以 [Claude Code](https://claude.com/claude-code) 與 GSAP 製作。

<p align="right"><a href="#top">↑ 回到頂端</a></p>
