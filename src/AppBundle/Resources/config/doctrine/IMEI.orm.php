<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->customRepositoryClassName = 'AppBundle\Repository\IMEIRepository';
$metadata->setChangeTrackingPolicy(ClassMetadataInfo::CHANGETRACKING_DEFERRED_IMPLICIT);
$metadata->mapField(array(
   'fieldName' => 'id',
   'type' => 'integer',
   'id' => true,
   'columnName' => 'id',
  ));
$metadata->mapField(array(
   'columnName' => 'cod_imei',
   'fieldName' => 'codImei',
   'type' => 'string',
   'length' => '50',
   'unique' => true,
  ));
$metadata->mapField(array(
   'columnName' => 'product_id',
   'fieldName' => 'productId',
   'type' => 'integer',
  ));
$metadata->mapField(array(
   'columnName' => 'master_id',
   'fieldName' => 'masterId',
   'type' => 'integer',
   'null'=>true,
  ));
$metadata->mapField(array(
   'columnName' => 'status',
   'fieldName' => 'status',
   'type' => 'integer',
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_AUTO);