
<?php

class GetService extends CI_Model{

	function getCategoryDetails(){
		$finalArray=array();
		$finalArray['status']=1;
			$this->load->database();
			$SQL='select cat1.id as categoryId,cat1.name as categoryName,cat2.id as SubCategoryId,cat2.name as SubCategoryName, cat3.id as ChildCategoryId, cat3.name as ChildCategoryName from category as cat1 left join category as cat2 on cat2.type=2 and cat2.parent = cat1.id left join category as cat3 on cat3.type=3 and cat3.parent = cat2.id where cat1.type=1 order by cat1.id';
			$query = $this->db->query($SQL);
			$finalResponse=$query->result_array();	
		
		// return $finalResponse;
		$returnarray=array();
		$j=0;$k=0;
		for ($i=0; $i <sizeof($finalResponse) ; $i++) { 
			if($i==0 || ($finalResponse[$i-1]['categoryId']!=$finalResponse[$i]['categoryId']) ) {
				if($i!=0)
					$j++;
				$returnarray[$j]['categoryId']=$finalResponse[$i]['categoryId'];
				$returnarray[$j]['categoryName']=$finalResponse[$i]['categoryName'];
				$returnarray[$j]['subCategory']=array();
			}
			if(!(sizeof($returnarray[$j]['subCategory'])>0 && $returnarray[$j]['subCategory'][$k]['subCategoryId']==$finalResponse[$i]['SubCategoryId'])){
				if($finalResponse[$i]['SubCategoryId']!=null){
					$subcategory=array();
					$subcategory['subCategoryId']=$finalResponse[$i]['SubCategoryId'];
					$subcategory['subCategoryName']=$finalResponse[$i]['SubCategoryName'];
					$subcategory['childCategory']=array();
					if($finalResponse[$i]['ChildCategoryId']!=null){
						$childCategory=array();
						$childCategory['childCategoryId']=$finalResponse[$i]['ChildCategoryId'];
						$childCategory['childCategoryName']=$finalResponse[$i]['ChildCategoryName'];
						array_push($subcategory['childCategory'], $childCategory);
					}
					array_push($returnarray[$j]['subCategory'], $subcategory);	
				}	
			}else{
				if($finalResponse[$i]['ChildCategoryId']!=null){
					$childCategory=array();
					$childCategory['childCategoryId']=$finalResponse[$i]['ChildCategoryId'];
					$childCategory['childCategoryName']=$finalResponse[$i]['ChildCategoryName'];
					array_push($returnarray[$j]['subCategory'][$k]['childCategory'], $childCategory);
				}
			}	
		}
		$finalArray['data']=$returnarray;
		return $finalArray;			
	}

	function getProductdetails(){
		$this->load->database();		
		$SQL='SELECT p.id productId,p.name productName,c.name categoryName,pd.pkey pdatakey,pd.pvalue pdatavalue,pd.title title,pd.type ptype FROM `product` as p join category c on c.id=p.category join product_data pd on pd.product=p.id';
		if((isset($_GET['productid']) && $_GET['productid']!='') || (isset($_GET['category']) && $_GET['category']!='') || (isset($_GET['published']) && $_GET['published']!='')){
			$SQL.=' where ';
		}
		$where='';
		if(isset($_GET['productid']) && $_GET['productid']!='') {
			$where.='p.id='.$_GET['productid'];	
		}
		if(isset($_GET['category']) && $_GET['category']!=''){
			if($where!='')
				$where.=' and ';
			$where.='c.id='.$_GET['category'];	
		}
		if(isset($_GET['published']) && $_GET['published']!=''){
			if($where!='')
				$where.=' and ';
			$where.=' p.published='.$_GET['published'];	
		}
		$SQL.=$where;
		$SQL.=' order by p.id';
		// var_dump($SQL);exit;
		
		$query = $this->db->query($SQL);
		$finalResponse=$query->result_array();
		// var_dump($finalResponse);exit;
		$returnarray=array();
		$j=0;$k=0;
		for ($i=0; $i < sizeof($finalResponse); $i++) { 
			if($i==0 || ($finalResponse[$i-1]['productId']!=$finalResponse[$i]['productId']) ) {
				if($i!=0)
					$j++;
				$returnarray[$j]['productId']=$finalResponse[$i]['productId'];
				$returnarray[$j]['productName']=$finalResponse[$i]['productName'];
				$returnarray[$j]['attribute']=array();
				$returnarray[$j]['specification']=array();
				$returnarray[$j]['features']=array();
			}
			$attribute=array();
			$attribute['pdatakey']=$finalResponse[$i]['pdatakey'];
			$attribute['pdatavalue']=$finalResponse[$i]['pdatavalue'];
			$attribute['title']=$finalResponse[$i]['title'];
			
			if($finalResponse[$i]['ptype']==1) {			
					array_push($returnarray[$j]['attribute'], $attribute);		
			}
			if($finalResponse[$i]['ptype']==2) {			
					array_push($returnarray[$j]['features'], $attribute);		
			}		
			if($finalResponse[$i]['ptype']==3) {			
					array_push($returnarray[$j]['specification'], $attribute);		
			}
		}
			return $returnarray;			
 	
	}
}