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
