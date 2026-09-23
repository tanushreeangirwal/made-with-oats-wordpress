# Made With Oats — Internal Content Flags & Data Conflicts Audit

> [!NOTE]
> This is an internal audit and specification tracking document. It must **never** be exposed in customer-facing UI or customer-accessible pages.
> The purpose of this document is to log unresolved conflicts found across raw client documents, briefs, and legacy prototypes so that the client and developer can explicitly confirm them without silent guessing.

---

## 1. Product Pricing & Variant Conflicts

| Item / SKU | Conflict Details | Value Used in Phase 1 Data | Status |
| :--- | :--- | :--- | :--- |
| **G002** (Peanut Butter & Dark Chocolate Granola) | Brief notes list 100g base price as ₹170 in one table and ₹180 in another product listing. | **₹180** (100g: ₹180, 200g: ₹270, 500g: ₹699) | `needs_confirmation: true` |
| **G003** (Almond Raisin Granola) | Base price listed as ₹160 vs ₹150 in different summaries; checkout fixture previously showed ₹140; 200g variant had a severe discrepancy of ₹2750 (likely a typo for ₹260 or ₹275). | **₹150** (100g: ₹150, 200g: ₹260, 500g: ₹549) | `needs_confirmation: true` |
| **CB003** (Intense Dark Chocolate Rajgira Bars) | Listed at ₹95 in the catalogue notes vs ₹90 in the summary pricing card. | **₹95** (Single: ₹95, Pack of 3: ₹270, Pack of 6: ₹510) | `needs_confirmation: true` |
| **GB001** (Triple Seed Crunch Bar) | Listed at ₹85 in one place vs ₹65 in early notes. | **₹85** (Single: ₹85, Pack of 3: ₹240, Pack of 6: ₹450) | `needs_confirmation: true` |

---

## 2. Product Pack & Variant Options

| Item / SKU | Conflict Details | Value Used in Phase 1 Data | Status |
| :--- | :--- | :--- | :--- |
| **Snack Bars Pack Sizes** (CB003, GB001, GB002) | Some notes describe pack options as `Single / Pack of 3 / Pack of 6`, while other prototype mocks listed `Single / 3 / 6 / Box of 12`. | **Single, Pack of 3, Pack of 6** | `needs_confirmation: true` |
| **CB001** (Chocolate Rajgira Bites) | Described as "Milk Chocolate" in one packaging note snippet, but "Dark Chocolate" in the ingredients and confirmed recipe. | **Dark Chocolate** (in ingredients & descriptions) | `needs_confirmation: true` |
| **CB003 Weight Discrepancy** | Bar packaging label PDF specifies "40 gms", whereas the confirmed card and size selector specify "Single Bar (35g)". | **Single Bar (35g)** in catalogue data; PDF packaging artwork reads 40 gms. | `needs_confirmation: true` |
| **CB002 Pouch Label Text** | Client source PDF pouch artwork for 250g, 500g, 1kg displays "Chocolate Rajgira Bites" without the prefix "Intense". | Product name retained as **Intense Dark Chocolate Rajgira Bites** in catalogue; packaging label noted. | `needs_confirmation: true` |
| **G003 Product Name** | Named "Almond Raisin Granola" in core tables vs "Almond Raisin Cinnamon Granola" in descriptive recipe copy. | **Almond Raisin Granola** (Cinnamon kept in ingredient listing) | `needs_confirmation: true` |

---

## 3. Catalogue Inclusions & Gifting Scope

| Item / Entity | Conflict Details | Resolution in Phase 1 | Status |
| :--- | :--- | :--- | :--- |
| **BUNDLE001** (All Bars Collection Box) | Existed in prototype code as a combo pack, but was not part of the confirmed core 8 single-product catalogue provided by the client. | **Withheld from active customer catalogue** and products database. | `needs_confirmation: true` |
| **DH001** (Diwali Hamper 1) & Gifting Suite | Client instructions require all gifting/hamper content removed from customer-facing store experience. | **Strictly excluded from active catalogue.** `?sku=DH001` automatically redirects to `shop.html`. All gifting navigation and tiles removed from customer UI. Hamper PDF source files in Drive are not used. | `deprecated_from_ui: true` |
| **Peanut Butter Crunch & Berry Bliss Bars** | Client Drive contains extra bar artwork/PDF files for Peanut Butter Crunch and Berry Bliss bars. These do not belong to the 8 verified core SKUs. | **Strictly omitted.** No products or pages created for unconfirmed bars. | `needs_confirmation: true` |
| **"Dark Chocolate Cookie Bite"** | Appeared in a legacy checkout mockup fixture, but does not exist anywhere in the confirmed 8-item catalogue. | **Permanently purged** from checkout, cart, and mock data stores. | `purged: true` |

---

## 4. Delivery & Operational Claims

| Item / Policy | Conflict Details | Value Used in Phase 1 Data | Status |
| :--- | :--- | :--- | :--- |
| **Delivery Timelines** | Some pages mentioned 7 to 10–12 business days; others cited 5–7 days (Maharashtra) and 7–10 days (Rest of India). | **5–7 days for Maharashtra & 7–10 days for Rest of India.** No specific logistics or courier company name is ever mentioned. | `needs_confirmation: true` |
| **Shipping Flat Rates** | Previously set to ₹60 Maharashtra / ₹100 Rest of India. | **Resolved per client direction:** Flat **₹80** within Maharashtra, Flat **₹100** Rest of India, and **FREE shipping** for orders above ₹1,299. | `resolved_policy: true` |
| **Category Label: Power Bites** | Previously labeled as "Power Bites" across store filters and product cards. | **Resolved per client direction:** Renamed throughout to **"Indulgent Chocolate Bites"**. | `resolved_policy: true` |
| **"Couverture" Usage** | Marketing guidelines prohibit using "Couverture" as a promotional USP or headline, but authentic technical ingredient lists contain Couverture Dark Chocolate. | Removed from all promotional headlines, value propositions, and marketing badges. **Retained solely in technical ingredient lists** where authentic. | `resolved_policy: true` |
| **"Quality in Every Bite"** | Guideline states this tagline should be kept exclusively in the Hero banner. | Purged from sub-sections, trust strips, and product cards. Preserved only in the primary Hero banner. | `resolved_policy: true` |
