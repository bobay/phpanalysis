<?php 
namespace xiaohigh\phpanalysis;

class Analysis
{
	/**
	 * 实现分词功能
	 */
	public function run($content, $num, $type = 0)
	{
		PhpAnalysis::$loadInit = false;
		$pa = new PhpAnalysis('utf-8', 'utf-8', false);
		$pa->LoadDict();
		$content = strip_tags($content);
		$pa->SetSource($content);
		$pa->StartAnalysis( false );
		$type = (int) $type;
		switch ($type) {
			case 1:
				$tags = $pa->GetFinallyKeywordsArr($num);
				break;
			case 2:
				$tags = $pa->GetFinallyKeywordsCount();
				break;
			case 3:
				$tags = $pa->GetFinallyIndex();
				break;
			case 4:
				$tags = $pa->GetFinallyKeywordsCount();
				break;
			case 5:
				$tags = $pa->GetFinallyKeywordsStat($num);
				break;
			case 6:
				$tags = $pa->GetTfidfKeywords($num);
				break;
			default:
				$tags = $pa->GetFinallyKeywords($num-1);
				break;
		}
		return $tags;
	}
}
