import { defineScreenshotScenario } from '@verbb/craft-screenshots/api';

import { seedElementIndexDefaultsFixture } from '../../support/fixtures';

export default defineScreenshotScenario({
    id: 'element-index-defaults-feature-tour-settings',
    output: 'feature-tour/element-index-defaults-settings.png',
    route: '/admin/element-index-defaults/settings#Entry',
    viewport: {
        width: 1120,
        height: 720,
        deviceScaleFactor: 2,
    },
    setup: seedElementIndexDefaultsFixture,
    waitFor: [
        { type: 'loadState', state: 'networkidle' },
        { type: 'selector', selector: '.source-settings[data-element="Entry"]:not(.hidden)', state: 'visible' },
        { type: 'text', text: 'Table Columns' },
        { type: 'text', text: 'Post Date' },
        { type: 'text', text: 'Authors' },
    ],
    preSteps: [
        {
            type: 'evaluate',
            expression: `
                (() => {
                    if (document.activeElement instanceof HTMLElement) {
                        document.activeElement.blur();
                    }

                    window.scrollTo(0, 0);
                })();
            `,
        },
        { type: 'wait', waitFor: { type: 'timeout', ms: 200 } },
    ],
    target: {
        type: 'anchoredClip',
        selector: '#main',
        x: 0,
        y: 35,
        width: 920,
        height: 550,
    },
    caption: 'Entry table-column defaults configured in Element Index Defaults for Craft 5.',
    intent: 'Show the real plugin settings where administrators choose and order the columns editors receive by default.',
});
