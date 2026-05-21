import { test, expect } from '@playwright/test';

test.describe('Campaign Styling: Listing', () => {
  test('shows a campaign product card with campaign price styling in the listing', async ({ page }) => {
    await page.goto('/Free-time-electronics/');

    const campaignProductCard = page.getByTestId('campaign-product-card').first();
    const campaignProductPrice = campaignProductCard.getByTestId('campaign-product-price');

    await expect(campaignProductCard).toBeVisible();
    await expect(campaignProductPrice).toBeVisible();
  });
});

test.describe('Campaign Styling: PDP', () => {
  test('shows the campaign buy box with adapted list price styling on the PDP', async ({ page }) => {
    await page.goto('/Free-time-electronics/');

    const campaignProductCard = page.getByTestId('campaign-product-card').first();
    await expect(campaignProductCard).toBeVisible();

    const productLink = campaignProductCard.locator('a.product-image-link, a.product-name').first();
    await expect(productLink).toBeVisible();
    await productLink.click();

    const campaignDetailBuyBox = page.getByTestId('campaign-product-detail-buy');
    const campaignDetailListPrice = campaignDetailBuyBox.getByTestId('campaign-product-detail-list-price');

    await expect(campaignDetailBuyBox).toBeVisible();
    await expect(campaignDetailListPrice).toBeVisible();
  });
});
