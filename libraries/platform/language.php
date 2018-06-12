<?php
/**
 * @package    syscart
 *             libraries/platform/language.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class platformLanguage
{
	private $language = 'persian';
	private $code = 'fa-IR';
	private $direction = 'rtl';
	private $id = null;

	public function set($language = 'persian', $code = 'fa-IR', $direction = 'rtl')
	{
		$this->language = $language;
		$this->code = $code;
		$this->direction = $direction;
	}

	public function getLanguage()
	{
		return $this->language;
	}

	public function getCode()
	{
		return $this->code;
	}

	public function getID()
	{
		if(!isset( $this->id )) {
			global $sysDbo;

			$sql = "SELECT id
				  	  FROM #__language
				 	 WHERE code = :code";
			$sql = platformQuery::refactor($sql);

			$query = $sysDbo->prepare($sql);
			$query->bindParam(':code', $this->code, PDO::PARAM_INT);

			$query->execute();
			$result = $query->fetch(\PDO::FETCH_ASSOC);
			$this->id = $result['id'];
		}

		return $this->id;
	}

	public function getDirection()
	{
		return $this->direction;
	}

	public function generate($data = '')
	{
		global $sysDbo, $sysLang;

		$regex = "/\\{\\{t:(\\S+)\\}\\}/";
		preg_match_all($regex, $data, $matches);

		$languageGroups = [];
		foreach( $matches[1] as $textLang ) {
			$partLang = explode('.', $textLang);
			if( !in_array($partLang[0], $languageGroups, true) ) {
				array_push($languageGroups, "'".$partLang[0]."'");
			}
		}
		if($languageGroups) {
			$sql = "SELECT groups, meta, value
				  	  FROM #__language_code
				 	 WHERE languageId = :langID
				   	   AND groups IN (".implode(',', $languageGroups).")
				       AND state = '1'";
			$sql = platformQuery::refactor($sql);

			$query = $sysDbo->prepare($sql);
			$query->bindValue(':langID', $sysLang->getID(), PDO::PARAM_INT);

			$query->execute();
			$result = $query->fetchAll(\PDO::FETCH_ASSOC);

			$langKey = $langValue = [];
			foreach( $result as $langData ) {
				$langKey[] = '{{t:'.$langData[ 'groups' ].'.'.$langData[ 'meta' ].'}}';
				$langValue[] = $langData[ 'value' ];
			}

			return str_replace($langKey, $langValue, $data);
		} else {
			return $data;
		}
	}
}