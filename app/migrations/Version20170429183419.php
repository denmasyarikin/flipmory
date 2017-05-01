<?php

namespace Sylius\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170429183419 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sylius_api_access_token DROP FOREIGN KEY FK_7D83AA7F19EB6921');
        $this->addSql('ALTER TABLE sylius_api_auth_code DROP FOREIGN KEY FK_C840417919EB6921');
        $this->addSql('ALTER TABLE sylius_api_refresh_token DROP FOREIGN KEY FK_4457852519EB6921');
        $this->addSql('ALTER TABLE sylius_payment DROP FOREIGN KEY FK_D9191BD47048FD0F');
        $this->addSql('CREATE TABLE sylius_product_association_type_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_4F618E52C2AC5D3 (translatable_id), UNIQUE INDEX sylius_product_association_type_translation_uniq_trans (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_product_variant_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_8DC18EDC2C2AC5D3 (translatable_id), UNIQUE INDEX sylius_product_variant_translation_uniq_trans (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_address_log_entries (id INT AUTO_INCREMENT NOT NULL, action VARCHAR(255) NOT NULL, loggedAt DATETIME NOT NULL, objectId VARCHAR(64) DEFAULT NULL, objectClass VARCHAR(255) NOT NULL, version INT NOT NULL, data LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', username VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_product_image_product_variants (image_id INT NOT NULL, variant_id INT NOT NULL, INDEX IDX_8FFDAE8D3DA5256D (image_id), INDEX IDX_8FFDAE8D3B69A9AF (variant_id), PRIMARY KEY(image_id, variant_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_admin_api_access_token (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, user_id INT DEFAULT NULL, token VARCHAR(255) NOT NULL, expires_at INT DEFAULT NULL, scope VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_2AA4915D5F37A13B (token), INDEX IDX_2AA4915D19EB6921 (client_id), INDEX IDX_2AA4915DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_admin_api_auth_code (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, user_id INT DEFAULT NULL, token VARCHAR(255) NOT NULL, redirect_uri LONGTEXT NOT NULL, expires_at INT DEFAULT NULL, scope VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_E366D8485F37A13B (token), INDEX IDX_E366D84819EB6921 (client_id), INDEX IDX_E366D848A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_admin_api_client (id INT AUTO_INCREMENT NOT NULL, random_id VARCHAR(255) NOT NULL, redirect_uris LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', secret VARCHAR(255) NOT NULL, allowed_grant_types LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_admin_api_refresh_token (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, user_id INT DEFAULT NULL, token VARCHAR(255) NOT NULL, expires_at INT DEFAULT NULL, scope VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_9160E3FA5F37A13B (token), INDEX IDX_9160E3FA19EB6921 (client_id), INDEX IDX_9160E3FAA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phpcr_namespaces (prefix VARCHAR(255) NOT NULL, uri VARCHAR(255) NOT NULL, PRIMARY KEY(prefix)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phpcr_workspaces (name VARCHAR(255) NOT NULL, PRIMARY KEY(name)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phpcr_nodes (id INT AUTO_INCREMENT NOT NULL, path VARCHAR(255) NOT NULL, parent VARCHAR(255) NOT NULL, local_name VARCHAR(255) NOT NULL, namespace VARCHAR(255) NOT NULL, workspace_name VARCHAR(255) NOT NULL, identifier VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, props LONGTEXT NOT NULL, numerical_props LONGTEXT DEFAULT NULL, depth INT NOT NULL, sort_order INT DEFAULT NULL, UNIQUE INDEX UNIQ_A4624AD7B548B0F1AC10DC4 (path, workspace_name), UNIQUE INDEX UNIQ_A4624AD7772E836A1AC10DC4 (identifier, workspace_name), INDEX IDX_A4624AD73D8E604F (parent), INDEX IDX_A4624AD78CDE5729 (type), INDEX IDX_A4624AD7623C14D533E16B56 (local_name, namespace), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phpcr_internal_index_types (type VARCHAR(255) NOT NULL, node_id INT NOT NULL, PRIMARY KEY(type, node_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phpcr_binarydata (id INT AUTO_INCREMENT NOT NULL, node_id INT NOT NULL, property_name VARCHAR(255) NOT NULL, workspace_name VARCHAR(255) NOT NULL, idx INT DEFAULT 0 NOT NULL, data LONGBLOB NOT NULL, UNIQUE INDEX UNIQ_37E65615460D9FD7413BC13C1AC10DC4E7087E10 (node_id, property_name, workspace_name, idx), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phpcr_nodes_references (source_id INT NOT NULL, source_property_name VARCHAR(220) NOT NULL, target_id INT NOT NULL, INDEX IDX_F3BF7E1158E0B66 (target_id), PRIMARY KEY(source_id, source_property_name, target_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phpcr_nodes_weakreferences (source_id INT NOT NULL, source_property_name VARCHAR(220) NOT NULL, target_id INT NOT NULL, INDEX IDX_F0E4F6FA158E0B66 (target_id), PRIMARY KEY(source_id, source_property_name, target_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phpcr_type_nodes (node_type_id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, supertypes VARCHAR(255) NOT NULL, is_abstract TINYINT(1) NOT NULL, is_mixin TINYINT(1) NOT NULL, queryable TINYINT(1) NOT NULL, orderable_child_nodes TINYINT(1) NOT NULL, primary_item VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_34B0A8095E237E06 (name), PRIMARY KEY(node_type_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phpcr_type_props (node_type_id INT NOT NULL, name VARCHAR(255) NOT NULL, protected TINYINT(1) NOT NULL, auto_created TINYINT(1) NOT NULL, mandatory TINYINT(1) NOT NULL, on_parent_version INT NOT NULL, multiple TINYINT(1) NOT NULL, fulltext_searchable TINYINT(1) NOT NULL, query_orderable TINYINT(1) NOT NULL, required_type INT NOT NULL, query_operators INT NOT NULL, default_value VARCHAR(255) DEFAULT NULL, PRIMARY KEY(node_type_id, name)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phpcr_type_childs (node_type_id INT NOT NULL, name VARCHAR(255) NOT NULL, protected TINYINT(1) NOT NULL, auto_created TINYINT(1) NOT NULL, mandatory TINYINT(1) NOT NULL, on_parent_version INT NOT NULL, primary_types VARCHAR(255) NOT NULL, default_type VARCHAR(255) DEFAULT NULL) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sylius_product_association_type_translation ADD CONSTRAINT FK_4F618E52C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES sylius_product_association_type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_variant_translation ADD CONSTRAINT FK_8DC18EDC2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES sylius_product_variant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_image_product_variants ADD CONSTRAINT FK_8FFDAE8D3DA5256D FOREIGN KEY (image_id) REFERENCES sylius_product_image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_image_product_variants ADD CONSTRAINT FK_8FFDAE8D3B69A9AF FOREIGN KEY (variant_id) REFERENCES sylius_product_variant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_admin_api_access_token ADD CONSTRAINT FK_2AA4915D19EB6921 FOREIGN KEY (client_id) REFERENCES sylius_admin_api_client (id)');
        $this->addSql('ALTER TABLE sylius_admin_api_access_token ADD CONSTRAINT FK_2AA4915DA76ED395 FOREIGN KEY (user_id) REFERENCES sylius_admin_user (id)');
        $this->addSql('ALTER TABLE sylius_admin_api_auth_code ADD CONSTRAINT FK_E366D84819EB6921 FOREIGN KEY (client_id) REFERENCES sylius_admin_api_client (id)');
        $this->addSql('ALTER TABLE sylius_admin_api_auth_code ADD CONSTRAINT FK_E366D848A76ED395 FOREIGN KEY (user_id) REFERENCES sylius_admin_user (id)');
        $this->addSql('ALTER TABLE sylius_admin_api_refresh_token ADD CONSTRAINT FK_9160E3FA19EB6921 FOREIGN KEY (client_id) REFERENCES sylius_admin_api_client (id)');
        $this->addSql('ALTER TABLE sylius_admin_api_refresh_token ADD CONSTRAINT FK_9160E3FAA76ED395 FOREIGN KEY (user_id) REFERENCES sylius_admin_user (id)');
        $this->addSql('DROP TABLE sylius_api_access_token');
        $this->addSql('DROP TABLE sylius_api_auth_code');
        $this->addSql('DROP TABLE sylius_api_client');
        $this->addSql('DROP TABLE sylius_api_refresh_token');
        $this->addSql('DROP TABLE sylius_credit_card');
        $this->addSql('ALTER TABLE sylius_exchange_rate ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_locale DROP enabled');
        $this->addSql('ALTER TABLE sylius_product_association_type DROP name');
        $this->addSql('ALTER TABLE sylius_product_attribute_value ADD locale_code VARCHAR(255) NOT NULL, ADD json_value LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json_array)\'');
        $this->addSql('ALTER TABLE sylius_product_option ADD position INT NOT NULL');
        $this->addSql('ALTER TABLE sylius_channel ADD contact_email VARCHAR(255) DEFAULT NULL, ADD skipping_shipping_step_allowed TINYINT(1) NOT NULL, ADD skipping_payment_step_allowed TINYINT(1) NOT NULL, ADD account_verification_required TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE sylius_channel_pricing DROP FOREIGN KEY FK_7801820C72F5A1AA');
        $this->addSql('DROP INDEX IDX_7801820C72F5A1AA ON sylius_channel_pricing');
        $this->addSql('ALTER TABLE sylius_channel_pricing ADD original_price INT DEFAULT NULL, ADD channel_code VARCHAR(255) NOT NULL, DROP channel_id');
        $this->addSql('CREATE UNIQUE INDEX product_variant_channel_idx ON sylius_channel_pricing (product_variant_id, channel_code)');
        $this->addSql('ALTER TABLE sylius_order_sequence ADD version INT DEFAULT 1 NOT NULL');
        $this->addSql('ALTER TABLE sylius_payment DROP FOREIGN KEY FK_D9191BD419883967');
        $this->addSql('DROP INDEX IDX_D9191BD47048FD0F ON sylius_payment');
        $this->addSql('ALTER TABLE sylius_payment DROP credit_card_id');
        $this->addSql('ALTER TABLE sylius_payment ADD CONSTRAINT FK_D9191BD419883967 FOREIGN KEY (method_id) REFERENCES sylius_payment_method (id)');
        $this->addSql('ALTER TABLE sylius_payment_method ADD gateway_config_id INT DEFAULT NULL, DROP gateway');
        $this->addSql('ALTER TABLE sylius_payment_method ADD CONSTRAINT FK_A75B0B0DF23D6140 FOREIGN KEY (gateway_config_id) REFERENCES sylius_gateway_config (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_A75B0B0DF23D6140 ON sylius_payment_method (gateway_config_id)');
        $this->addSql('ALTER TABLE sylius_product DROP available_on, DROP available_until');
        $this->addSql('DROP INDEX product_image_code_idx ON sylius_product_image');
        $this->addSql('ALTER TABLE sylius_product_image ADD type VARCHAR(255) DEFAULT NULL, DROP code');
        $this->addSql('ALTER TABLE sylius_product_review DROP FOREIGN KEY FK_C7056A99F675F31B');
        $this->addSql('ALTER TABLE sylius_product_review CHANGE author_id author_id INT NOT NULL');
        $this->addSql('ALTER TABLE sylius_product_review ADD CONSTRAINT FK_C7056A99F675F31B FOREIGN KEY (author_id) REFERENCES sylius_customer (id) ON DELETE CASCADE');
        $this->addSql('CREATE UNIQUE INDEX product_taxon_idx ON sylius_product_taxon (product_id, taxon_id)');
        $this->addSql('DROP INDEX UNIQ_105A908989D9B62 ON sylius_product_translation');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_105A9084180C698989D9B62 ON sylius_product_translation (locale, slug)');
        $this->addSql('ALTER TABLE sylius_product_variant ADD position INT NOT NULL, ADD version INT DEFAULT 1 NOT NULL, ADD shipping_required TINYINT(1) NOT NULL, DROP name, DROP available_on, DROP available_until');
        $this->addSql('ALTER TABLE sylius_shipping_method ADD archived_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_taxon ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('DROP INDEX taxon_image_code_idx ON sylius_taxon_image');
        $this->addSql('ALTER TABLE sylius_taxon_image ADD type VARCHAR(255) DEFAULT NULL, DROP code');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sylius_admin_api_access_token DROP FOREIGN KEY FK_2AA4915D19EB6921');
        $this->addSql('ALTER TABLE sylius_admin_api_auth_code DROP FOREIGN KEY FK_E366D84819EB6921');
        $this->addSql('ALTER TABLE sylius_admin_api_refresh_token DROP FOREIGN KEY FK_9160E3FA19EB6921');
        $this->addSql('CREATE TABLE sylius_api_access_token (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, user_id INT DEFAULT NULL, token VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, expires_at INT DEFAULT NULL, scope VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX UNIQ_7D83AA7F5F37A13B (token), INDEX IDX_7D83AA7F19EB6921 (client_id), INDEX IDX_7D83AA7FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_api_auth_code (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, user_id INT DEFAULT NULL, token VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, redirect_uri LONGTEXT NOT NULL COLLATE utf8_unicode_ci, expires_at INT DEFAULT NULL, scope VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX UNIQ_C84041795F37A13B (token), INDEX IDX_C840417919EB6921 (client_id), INDEX IDX_C8404179A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_api_client (id INT AUTO_INCREMENT NOT NULL, random_id VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, redirect_uris LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:array)\', secret VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, allowed_grant_types LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_api_refresh_token (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, user_id INT DEFAULT NULL, token VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, expires_at INT DEFAULT NULL, scope VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX UNIQ_445785255F37A13B (token), INDEX IDX_4457852519EB6921 (client_id), INDEX IDX_44578525A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sylius_credit_card (id INT AUTO_INCREMENT NOT NULL, token VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, type VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, cardholder_name VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, number VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, security_code VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, expiry_month INT DEFAULT NULL, expiry_year INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sylius_api_access_token ADD CONSTRAINT FK_7D83AA7F19EB6921 FOREIGN KEY (client_id) REFERENCES sylius_api_client (id)');
        $this->addSql('ALTER TABLE sylius_api_access_token ADD CONSTRAINT FK_7D83AA7FA76ED395 FOREIGN KEY (user_id) REFERENCES sylius_admin_user (id)');
        $this->addSql('ALTER TABLE sylius_api_auth_code ADD CONSTRAINT FK_C840417919EB6921 FOREIGN KEY (client_id) REFERENCES sylius_api_client (id)');
        $this->addSql('ALTER TABLE sylius_api_auth_code ADD CONSTRAINT FK_C8404179A76ED395 FOREIGN KEY (user_id) REFERENCES sylius_admin_user (id)');
        $this->addSql('ALTER TABLE sylius_api_refresh_token ADD CONSTRAINT FK_4457852519EB6921 FOREIGN KEY (client_id) REFERENCES sylius_api_client (id)');
        $this->addSql('ALTER TABLE sylius_api_refresh_token ADD CONSTRAINT FK_44578525A76ED395 FOREIGN KEY (user_id) REFERENCES sylius_admin_user (id)');
        $this->addSql('DROP TABLE sylius_product_association_type_translation');
        $this->addSql('DROP TABLE sylius_product_variant_translation');
        $this->addSql('DROP TABLE sylius_address_log_entries');
        $this->addSql('DROP TABLE sylius_product_image_product_variants');
        $this->addSql('DROP TABLE sylius_admin_api_access_token');
        $this->addSql('DROP TABLE sylius_admin_api_auth_code');
        $this->addSql('DROP TABLE sylius_admin_api_client');
        $this->addSql('DROP TABLE sylius_admin_api_refresh_token');
        $this->addSql('DROP TABLE phpcr_namespaces');
        $this->addSql('DROP TABLE phpcr_workspaces');
        $this->addSql('DROP TABLE phpcr_nodes');
        $this->addSql('DROP TABLE phpcr_internal_index_types');
        $this->addSql('DROP TABLE phpcr_binarydata');
        $this->addSql('DROP TABLE phpcr_nodes_references');
        $this->addSql('DROP TABLE phpcr_nodes_weakreferences');
        $this->addSql('DROP TABLE phpcr_type_nodes');
        $this->addSql('DROP TABLE phpcr_type_props');
        $this->addSql('DROP TABLE phpcr_type_childs');
        $this->addSql('ALTER TABLE sylius_channel DROP contact_email, DROP skipping_shipping_step_allowed, DROP skipping_payment_step_allowed, DROP account_verification_required');
        $this->addSql('DROP INDEX product_variant_channel_idx ON sylius_channel_pricing');
        $this->addSql('ALTER TABLE sylius_channel_pricing ADD channel_id INT NOT NULL, DROP original_price, DROP channel_code');
        $this->addSql('ALTER TABLE sylius_channel_pricing ADD CONSTRAINT FK_7801820C72F5A1AA FOREIGN KEY (channel_id) REFERENCES sylius_channel (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_7801820C72F5A1AA ON sylius_channel_pricing (channel_id)');
        $this->addSql('ALTER TABLE sylius_exchange_rate DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE sylius_locale ADD enabled TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE sylius_order_sequence DROP version');
        $this->addSql('ALTER TABLE sylius_payment DROP FOREIGN KEY FK_D9191BD419883967');
        $this->addSql('ALTER TABLE sylius_payment ADD credit_card_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_payment ADD CONSTRAINT FK_D9191BD47048FD0F FOREIGN KEY (credit_card_id) REFERENCES sylius_credit_card (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE sylius_payment ADD CONSTRAINT FK_D9191BD419883967 FOREIGN KEY (method_id) REFERENCES sylius_payment_method (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_D9191BD47048FD0F ON sylius_payment (credit_card_id)');
        $this->addSql('ALTER TABLE sylius_payment_method DROP FOREIGN KEY FK_A75B0B0DF23D6140');
        $this->addSql('DROP INDEX IDX_A75B0B0DF23D6140 ON sylius_payment_method');
        $this->addSql('ALTER TABLE sylius_payment_method ADD gateway VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, DROP gateway_config_id');
        $this->addSql('ALTER TABLE sylius_product ADD available_on DATETIME DEFAULT NULL, ADD available_until DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product_association_type ADD name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE sylius_product_attribute_value DROP locale_code, DROP json_value');
        $this->addSql('ALTER TABLE sylius_product_image ADD code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, DROP type');
        $this->addSql('CREATE UNIQUE INDEX product_image_code_idx ON sylius_product_image (owner_id, code)');
        $this->addSql('ALTER TABLE sylius_product_option DROP position');
        $this->addSql('ALTER TABLE sylius_product_review DROP FOREIGN KEY FK_C7056A99F675F31B');
        $this->addSql('ALTER TABLE sylius_product_review CHANGE author_id author_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product_review ADD CONSTRAINT FK_C7056A99F675F31B FOREIGN KEY (author_id) REFERENCES sylius_customer (id)');
        $this->addSql('DROP INDEX product_taxon_idx ON sylius_product_taxon');
        $this->addSql('DROP INDEX UNIQ_105A9084180C698989D9B62 ON sylius_product_translation');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_105A908989D9B62 ON sylius_product_translation (slug)');
        $this->addSql('ALTER TABLE sylius_product_variant ADD name VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, ADD available_on DATETIME DEFAULT NULL, ADD available_until DATETIME DEFAULT NULL, DROP position, DROP version, DROP shipping_required');
        $this->addSql('ALTER TABLE sylius_shipping_method DROP archived_at');
        $this->addSql('ALTER TABLE sylius_taxon DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE sylius_taxon_image ADD code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, DROP type');
        $this->addSql('CREATE UNIQUE INDEX taxon_image_code_idx ON sylius_taxon_image (owner_id, code)');
    }
}
