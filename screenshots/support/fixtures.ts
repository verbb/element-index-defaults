import { readFileSync } from 'node:fs';
import { dirname, join } from 'node:path';
import { fileURLToPath } from 'node:url';

import type { ScreenshotSetupContext } from '@verbb/craft-screenshots/types';

const supportDir = dirname(fileURLToPath(import.meta.url));
const seedScript = readFileSync(join(supportDir, 'seed', 'seed-element-index-defaults.php'), 'utf8');

/** Persist representative Craft 5 entry-index defaults through the plugin settings API. */
export async function seedElementIndexDefaultsFixture(context: ScreenshotSetupContext): Promise<void> {
    const output = await context.runCraftScript(seedScript, { label: 'seed-element-index-defaults' });
    const fixture = JSON.parse(output.trim()) as { settingsSaved?: boolean };

    if (fixture.settingsSaved !== true) {
        throw new Error(`Invalid Element Index Defaults fixture payload: ${output}`);
    }
}
