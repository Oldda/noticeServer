<?php
namespace App\Models\Entity;

use Swoft\Db\Model;
use Swoft\Db\Bean\Annotation\Column;
use Swoft\Db\Bean\Annotation\Entity;
use Swoft\Db\Bean\Annotation\Id;
use Swoft\Db\Bean\Annotation\Required;
use Swoft\Db\Bean\Annotation\Table;
use Swoft\Db\Types;

/**
 * @Entity()
 * @Table(name="users")
 * @uses      Users
 */
class Users extends Model
{
    /**
     * @var int $id 
     * @Id()
     * @Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var string $phone 手机号码
     * @Column(name="phone", type="string", length=11)
     * @Required()
     */
    private $phone;

    /**
     * @var string $nickname 昵称,游客随机
     * @Column(name="nickname", type="string", length=32, default="")
     */
    private $nickname;

    /**
     * @var int $gender 性别0未知1男2女
     * @Column(name="gender", type="tinyint", default=0)
     */
    private $gender;

    /**
     * @var string $thumbnail 头像
     * @Column(name="thumbnail", type="string", length=300, default="")
     */
    private $thumbnail;

    /**
     * @var string $motto 签名
     * @Column(name="motto", type="string", length=255)
     */
    private $motto;

    /**
     * @var string $birthday 生日时间戳
     * @Column(name="birthday", type="string", length=255)
     */
    private $birthday;

    /**
     * @var string $location 地区
     * @Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var string $createdAt 
     * @Column(name="created_at", type="timestamp")
     */
    private $createdAt;

    /**
     * @var string $updatedAt 
     * @Column(name="updated_at", type="timestamp")
     */
    private $updatedAt;

    /**
     * @var string $deletedAt 
     * @Column(name="deleted_at", type="timestamp")
     */
    private $deletedAt;

    /**
     * @param int $value
     * @return $this
     */
    public function setId(int $value)
    {
        $this->id = $value;

        return $this;
    }

    /**
     * 手机号码
     * @param string $value
     * @return $this
     */
    public function setPhone(string $value): self
    {
        $this->phone = $value;

        return $this;
    }

    /**
     * 昵称,游客随机
     * @param string $value
     * @return $this
     */
    public function setNickname(string $value): self
    {
        $this->nickname = $value;

        return $this;
    }

    /**
     * 性别0未知1男2女
     * @param int $value
     * @return $this
     */
    public function setGender(int $value): self
    {
        $this->gender = $value;

        return $this;
    }

    /**
     * 头像
     * @param string $value
     * @return $this
     */
    public function setThumbnail(string $value): self
    {
        $this->thumbnail = $value;

        return $this;
    }

    /**
     * 签名
     * @param string $value
     * @return $this
     */
    public function setMotto(string $value): self
    {
        $this->motto = $value;

        return $this;
    }

    /**
     * 生日时间戳
     * @param string $value
     * @return $this
     */
    public function setBirthday(string $value): self
    {
        $this->birthday = $value;

        return $this;
    }

    /**
     * 地区
     * @param string $value
     * @return $this
     */
    public function setLocation(string $value): self
    {
        $this->location = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setCreatedAt(string $value): self
    {
        $this->createdAt = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setUpdatedAt(string $value): self
    {
        $this->updatedAt = $value;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setDeletedAt(string $value): self
    {
        $this->deletedAt = $value;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 手机号码
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * 昵称,游客随机
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * 性别0未知1男2女
     * @return int
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * 头像
     * @return string
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * 签名
     * @return string
     */
    public function getMotto()
    {
        return $this->motto;
    }

    /**
     * 生日时间戳
     * @return string
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * 地区
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return string
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

}
