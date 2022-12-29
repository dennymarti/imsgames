<div class="games-wrapper">
    <div class="games-flexbox">
        <?php if (empty($games)): ?>
            <div class="box">
                <div class="box-header">
                    <h2 class="box-title"></h2>
                </div>

                <div class="box-content">
                    <div class="output-field">
                        <h4>Beschreibung</h4>
                        <p class="box-text"><?= $game->description; ?></p>
                    </div>
                </div>

                <div class="game-box-footer">
                    <a class="box-button" href="/game/selected?id=<?= $game->id; ?>">Spielen</a>
                </div>
            </div>
        <?php else: ?>
            <?php foreach ($games as $game): ?>
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title"><?= $game->name; ?></h2>
                    </div>

                    <div class="card-content">
                        <div class="card-field">
                            <h4 class="card-subtitle">Beschreibung</h4>
                            <div class="card-description" readonly><?= $game->description; ?></div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a class="card-button" href="/game/selected?id=<?= $game->id; ?>">Spielen</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>