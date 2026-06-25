# 如何手動新增條目到 SkillsBook

這份教你怎麼把一個 Skill 或 MCP **永久**寫進書裡（直接改 `index.html` 的 `DATA`）。
跟「同步檢查 → 匯入備份」不同：那個只存在瀏覽器 localStorage，換電腦或分享出去就不見；
寫進 `DATA` 才會跟著檔案走，推上 GitHub 大家都看得到。

---

## 一、先找到要填的資料

每個 skill 的資料都在它的 `SKILL.md` 開頭（frontmatter）。在終端機跑：

```bash
sed -n '1,12p' ~/.claude/skills/<skill 資料夾名>/SKILL.md
```

你要的是兩個欄位：
- `name:` → 英文名稱（填進 `en`）
- `description:` → 英文說明（精簡後填進 `enDesc`，並翻成中文填 `zhDesc`）

> MCP / plugin 沒有 SKILL.md，名稱看 `~/.claude/plugins/installed_plugins.json` 的 key。

---

## 二、一個條目長這樣

`DATA` 裡每一條就是一個 `{ }` 物件，欄位如下：

```js
{ id:'framer', type:'skill', cat:'frontend', en:'framer', zh:'Framer 網站設計',
  zhDesc:'用對話設計、編輯、發佈 Framer 網站——排版、CMS、樣式、部署。使用前須先跑 npx @framer/agent@latest setup。',
  enDesc:'Design, edit, and publish Framer websites — layouts, CMS, code components, styles, deployments.',
  trigger:'提到「Framer」或「我的網站」' },
```

| 欄位 | 意思 | 怎麼填 |
|---|---|---|
| `id` | 唯一識別碼，**不可重複** | 用 skill 資料夾名 |
| `type` | `'skill'` 或 `'mcp'` | skill 填 `'skill'`，MCP 填 `'mcp'` |
| `cat` | 放哪個章節 | 見下方「章節對照」 |
| `en` | 英文名 | 來自 `name:` |
| `zh` | 中文短名（卡片標題） | 自己取，4–8 字 |
| `zhDesc` | 中文一句介紹 | 翻譯／濃縮 `description` |
| `enDesc` | 英文一句介紹 | 濃縮原始 `description` |
| `trigger` | 怎麼觸發 | 例：`'/framer'` 或自然語句 |
| `on`（選填） | 平台徽章 | 例 `on:'Figma'`，沒有就不寫 |

> ⚠️ 格式重點：用**單引號**、每條結尾要有**逗號**、字串內若有單引號要避開（改用「」或全形）。一個逗號或引號打錯，整頁會空白——別怕，改回來就好。

---

## 三、章節對照（`cat` 要填的值）

**上篇 Skills（type 填 `'skill'`）**

| cat 值 | 章節 |
|---|---|
| `design` | 設計 |
| `figmaplus` | Figma 擴充 |
| `frontend` | 前端・動畫 ← Framer 放這 |
| `engineering` | 工程開發 |
| `docs` | 文件・簡報 |
| `productivity` | 生產力・知識 |
| `pm` | 產品管理 |
| `marketing` | 行銷・品牌 |
| `sales` | 業務・客服 |
| `collab` | 團隊協作 |
| `legal` / `hr` / `finance` / `ops` / `data` / `system` | 法務／人資／財務／營運／資料分析／系統設定 |
| `imported` | 新收錄 |

**下篇 MCP（type 填 `'mcp'`）**：`m-design`／`m-office`／`m-browser`／`m-data`／`m-connect`／`m-imported`

（章節定義在 `index.html` 的 `PARTS`，約第 2012 行。）

---

## 四、貼進去

1. 打開 `index.html`，找到對應章節的最後一條（例如前端區段在 `gsap-performance` 那條附近）
2. 在那條的 `},` 後面換行，貼上你的新條目
3. 存檔，重新整理瀏覽器 → 進對應章節就看得到

各章節有註解標記方便定位，例如：
```js
/* ── 工程開發 ── */
```

---

## 五、最快的做法：叫我幫你做

其實你不用手動填。直接跟 Claude Code 說：

> 「幫我把 `<skill 名>` 加進 skillsbook 的 DATA」

我會自己讀 `SKILL.md`、寫好中英說明、挑章節、貼進 `index.html`，再驗證頁面沒壞。
你也可以一次給多個，或說「掃一遍我新裝的 skill，沒收錄的都加進去」。

---

## 六、順手記一筆「最近更新」

書裡有個「最近更新」面板（目錄最底 → 附錄 · 工具 → 第一列），
資料來自 `index.html` 裡的 `CHANGELOG` 陣列。每次加東西，順手在**最上面**補一筆：

```js
const CHANGELOG = [
  { date: '2026-07-01', items: [          // ← 新的放最上面
    { t: 'add', d: '收錄了某某 skill' },   // t:'add' → 綠色「新增」標籤
    { t: 'upd', d: '更新了某某說明' },      // t:'upd' → 紫色「更新」標籤
  ]},
  // …舊的往下排，不用動
];
```

| 欄位 | 意思 |
|---|---|
| `date` | 日期字串，格式 `YYYY-MM-DD`（畫面會自動顯示成 `2026 / 07 / 01`） |
| `items` | 那天做的事，一件一個物件 |
| `t` | `'add'` = 綠色「新增」徽章；其他值（慣例用 `'upd'`）= 紫色「更新」徽章 |
| `d` | 那筆更新的中文描述 |

> 同一天的多筆，放進同一個 `{ date, items:[…] }` 就好，不用每筆都開一組日期。

---

## 七、改完記得存檔上線

```bash
cd skillsbook
git add index.html
git commit -m "data: add <名稱> entries"
git push
```

推上去之後，GitHub Pages 的線上版就會更新。

> 最省事的做法：直接跟我說「幫我把 X 加進 skillsbook，順便記一筆更新」，
> 我會一次把 `DATA` 跟 `CHANGELOG` 都補好、驗證頁面、commit 上線。
