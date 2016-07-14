<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->customRepositoryClassName = 'AppBundle\Repository\ProductRepository';
$metadata->setChangeTrackingPolicy(ClassMetadataInfo::CHANGETRACKING_DEFERRED_IMPLICIT);
$metadata->mapField(array(
   'fieldName' => 'id',
   'type' => 'integer',
   'id' => true,
   'columnName' => 'id',
  ));
$metadata->mapField(array(
	'fieldName' => 'code',
	'type' => 'string',
	'length' => 50,
	'null'=>false,
	'columnName' => 'code',
));
$metadata->mapField(array(
   'fieldName' => 'name',
   'type' => 'string',
   'length' => 255,
   'columnName' => 'name',
  ));
$metadata->mapField(array(
   'fieldName' => 'price',
   'type' => 'float',
   'columnName' => 'price',
  ));
$metadata->mapField(array(
   'fieldName' => 'description',
   'type' => 'text',
   'columnName' => 'description',
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_AUTO);