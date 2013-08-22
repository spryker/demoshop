SET NAMES UTF8;

SELECT
  wmc,
  pac_mcm_publication.id_mcm_publication,
  pac_mcm_publication.name,
  pac_mcm_partner.id_mcm_partner,
  pac_mcm_partner.name
FROM pac_mcm_campaign
  JOIN pac_mcm_publication ON fk_mcm_publication = id_mcm_publication
  JOIN pac_mcm_partner_in_channel ON fk_mcm_partner_in_channel = id_mcm_partner_in_channel
  JOIN pac_mcm_partner ON fk_mcm_partner = id_mcm_partner;