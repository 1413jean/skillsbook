<?php
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-cache');

$home = getenv('HOME');
$result = array('skills' => array(), 'plugins' => array());

$skillsDir = $home . '/.claude/skills';
if (is_dir($skillsDir)) {
    $items = scandir($skillsDir);
    foreach ($items as $item) {
        if ($item[0] === '.') continue;
        $dirPath = $skillsDir . '/' . $item;
        if (is_link($dirPath)) {
            $real = realpath($dirPath);
            if ($real) $dirPath = $real;
        }
        $skillMd = $dirPath . '/SKILL.md';
        if (!file_exists($skillMd)) continue;

        $content = file_get_contents($skillMd, false, null, 0, 600);
        $name = $item;
        $description = '';
        if (preg_match('/^---\s*\n(.*?)\n---/s', $content, $m)) {
            if (preg_match('/^description:\s*(.+)$/m', $m[1], $d)) {
                $description = substr(trim($d[1]), 0, 120);
            }
            if (preg_match('/^name:\s*(.+)$/m', $m[1], $n)) {
                $name = trim($n[1]);
            }
        }
        $result['skills'][] = array('id' => $item, 'name' => $name, 'desc' => $description);
    }
}

$pluginsFile = $home . '/.claude/plugins/installed_plugins.json';
if (file_exists($pluginsFile)) {
    $plugins = json_decode(file_get_contents($pluginsFile), true);
    if (isset($plugins['plugins'])) {
        foreach ($plugins['plugins'] as $pluginId => $versions) {
            $parts = explode('@', $pluginId);
            $result['plugins'][] = array('id' => $pluginId, 'name' => $parts[0]);
        }
    }
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);
