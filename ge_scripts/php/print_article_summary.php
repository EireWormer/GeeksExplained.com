<?php
function printArticleSummary($title, $summary, $link) {
    echo '
    <article class="summary-card">
        <div class="summary-card-title-container"><a href="' . $link . '">' . $title . '</a></div>
        <!-- 167 max -->
        <div class="summary-card-artice-summary">' . $summary . '...</div>
        <div class="summary-card-links"><a href="' . $link . '">Read more</a></div>
    </article>';
}
?>